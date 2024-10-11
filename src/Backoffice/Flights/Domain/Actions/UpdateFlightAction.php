<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\Domain\Actions;

use Lightit\Backoffice\Flights\Domain\DataTransferObjects\FlightDto;
use Lightit\Backoffice\Flights\Domain\Models\Flight;

class UpdateFlightAction
{
    public function execute(FlightDto $flightDto, Flight $flight): Flight
    {
        $flight->update([
            'airline_id' => $flightDto->getAirlineId(),
            'origin_city_id' => $flightDto->getOriginCityId(),
            'destination_city_id' => $flightDto->getDestinationCityId(),
            'departure_time' => $flightDto->getDepartureTime(),
            'arrival_time' => $flightDto->getArrivalTime(),
        ]);

        return $flight;
    }
}
