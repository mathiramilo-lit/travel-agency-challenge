<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\App\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;
use InvalidArgumentException;
use Lightit\Backoffice\Flights\Domain\DataTransferObjects\FlightDto;

class StoreFlightRequest extends FormRequest
{
    public const AIRLINE_ID = 'airline_id';

    public const ORIGIN_CITY_ID = 'origin_city_id';

    public const DESTINATION_CITY_ID = 'destination_city_id';

    public const DEPARTURE_TIME = 'departure_time';

    public const ARRIVAL_TIME = 'arrival_time';

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            self::AIRLINE_ID => ['required', 'int', 'exists:airlines,id'],
            self::ORIGIN_CITY_ID => ['required', 'int', 'exists:cities,id'],
            self::DESTINATION_CITY_ID => ['required', 'int', 'exists:cities,id'],
            self::DEPARTURE_TIME => ['required', 'date'],
            self::ARRIVAL_TIME => ['required', 'date', 'after:' . self::DEPARTURE_TIME],
        ];
    }

    public function toDto(): FlightDto
    {
        $airlineId = $this->validatedInteger(self::AIRLINE_ID);
        $originCityId = $this->validatedInteger(self::ORIGIN_CITY_ID);
        $destinationCityId = $this->validatedInteger(self::DESTINATION_CITY_ID);

        $departureTime = $this->validatedDate(self::DEPARTURE_TIME);
        $arrivalTime = $this->validatedDate(self::ARRIVAL_TIME);

        return new FlightDto(
            airlineId: $airlineId,
            originCityId: $originCityId,
            destinationCityId: $destinationCityId,
            departureTime: $departureTime,
            arrivalTime: $arrivalTime
        );
    }

    /**
     * Validate and cast the given input to an integer.
     *
     * @throws InvalidArgumentException
     */
    private function validatedInteger(string $key): int
    {
        $value = $this->input($key);
        if (! is_numeric($value)) {
            throw new InvalidArgumentException("Expected an integer for {$key}, got " . gettype($value));
        }

        return (int) $value;
    }

    /**
     * Validate and cast the given input to a Carbon date.
     *
     * @throws InvalidArgumentException
     */
    private function validatedDate(string $key): Carbon
    {
        $value = $this->input($key);

        if (! is_string($value)) {
            throw new InvalidArgumentException("Expected a date string for {$key}, but no value was provided.");
        }

        try {
            $date = Carbon::parse($value);
        } catch (\Exception $e) {
            throw new InvalidArgumentException("Invalid date format for {$key}: " . $e->getMessage());
        }

        return $date;
    }
}
