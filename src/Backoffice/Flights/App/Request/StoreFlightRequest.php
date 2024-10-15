<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\App\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;
use Lightit\Backoffice\Flights\Domain\DataTransferObjects\FlightDto;

class StoreFlightRequest extends FormRequest
{
    public const AIRLINE_ID = 'airline_id';

    public const ORIGIN_CITY_ID = 'origin_city_id';

    public const DESTINATION_CITY_ID = 'destination_city_id';

    public const DEPARTURE_AT = 'departure_at';

    public const ARRIVAL_AT = 'arrival_at';

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            self::AIRLINE_ID => ['required', 'int', 'exists:airlines,id'],
            self::ORIGIN_CITY_ID => ['required', 'int', 'exists:cities,id'],
            self::DESTINATION_CITY_ID => ['required', 'int', 'exists:cities,id'],
            self::DEPARTURE_AT => ['required', 'date'],
            self::ARRIVAL_AT => ['required', 'date', 'after:' . self::DEPARTURE_AT],
        ];
    }

    public function toDto(): FlightDto
    {
        /** @var Carbon $departureAt */
        $departureAt = $this->date(self::DEPARTURE_AT);
        /** @var Carbon $arrivalAt */
        $arrivalAt = $this->date(self::ARRIVAL_AT);

        return new FlightDto(
            airlineId: $this->integer(self::AIRLINE_ID),
            originCityId: $this->integer(self::ORIGIN_CITY_ID),
            destinationCityId: $this->integer(self::DESTINATION_CITY_ID),
            departureAt: $departureAt,
            arrivalAt: $arrivalAt,
        );
    }
}
