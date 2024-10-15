<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\App\Transformers;

use Flugg\Responder\Transformers\Transformer;
use Lightit\Backoffice\Flights\Domain\Models\Flight;

class FlightTransformer extends Transformer
{
    /**
     * @return array{id: int, airline_id: int, origin_city_id: int, destination_city_id: int, departure_at: string, arrival_at: string}
     */
    public function transform(Flight $flight): array
    {
        return [
            'id' => (int) $flight->id,
            'airline_id' => (int) $flight->airline_id,
            'origin_city_id' => (int) $flight->origin_city_id,
            'destination_city_id' => (int) $flight->destination_city_id,
            'departure_at' => $flight->departure_at,
            'arrival_at' => $flight->arrival_at,
        ];
    }
}
