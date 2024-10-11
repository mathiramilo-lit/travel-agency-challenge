<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\Domain\DataTransferObjects;

use Illuminate\Support\Carbon;
use InvalidArgumentException;

class FlightDto
{
    public function __construct(
        private readonly int $airlineId,
        private readonly int $originCityId,
        private readonly int $destinationCityId,
        private readonly Carbon $departureTime,
        private readonly Carbon $arrivalTime,
    ) {
        if ($this->departureTime >= $this->arrivalTime) {
            throw new InvalidArgumentException('Departure time must be earlier than arrival time.');
        }
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

    public function getDepartureTime(): Carbon
    {
        return $this->departureTime;
    }

    public function getArrivalTime(): Carbon
    {
        return $this->arrivalTime;
    }
}
