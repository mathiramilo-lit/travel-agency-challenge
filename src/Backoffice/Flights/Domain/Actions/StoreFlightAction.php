<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\Domain\Actions;

use Lightit\Backoffice\Flights\Domain\DataTransferObjects\FlightDto;
use Lightit\Backoffice\Flights\Domain\Models\Flight;

class StoreFlightAction
{
    public function execute(FlightDto $flightDto): Flight
    {
        $flight = new Flight([
            'airline_id' => $flightDto->getAirlineId(),
            'origin_city_id' => $flightDto->getOriginCityId(),
            'destination_city_id' => $flightDto->getDestinationCityId(),
            'departure_at' => $flightDto->getDepartureAt(),
            'arrival_at' => $flightDto->getArrivalAt(),
        ]);

        $flight->save();

        return $flight;
    }
}
