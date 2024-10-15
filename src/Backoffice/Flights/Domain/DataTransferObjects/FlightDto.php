<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\Domain\DataTransferObjects;

use Illuminate\Support\Carbon;

readonly class FlightDto
{
    public function __construct(
        private int $airlineId,
        private int $originCityId,
        private int $destinationCityId,
        private Carbon $departureAt,
        private Carbon $arrivalAt,
    ) {
    }

    public function getAirlineId(): int
    {
        return $this->airlineId;
    }

    public function getOriginCityId(): int
    {
        return $this->originCityId;
    }

    public function getDestinationCityId(): int
    {
        return $this->destinationCityId;
    }

    public function getDepartureAt(): Carbon
    {
        return $this->departureAt;
    }

    public function getArrivalAt(): Carbon
    {
        return $this->arrivalAt;
    }
}
