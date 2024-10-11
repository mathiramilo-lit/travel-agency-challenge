<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Lightit\Backoffice\Airlines\Domain\Models\Airline;
use Lightit\Backoffice\Cities\Domain\Models\City;
use Lightit\Backoffice\Flights\Domain\Models\Flight;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<Flight>
 */
class FlightFactory extends Factory
{
    protected $model = Flight::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $departureTime = fake()->dateTimeBetween('-1 year', '+1 year');
        $arrivalTime = (clone $departureTime)->modify('+' . fake()->numberBetween(1, 48) . ' hours'); // Add 1 to 12 hours

        /** @var Airline $airline */
        $airline = AirlineFactory::new()->create();

        /** @var City $originCity */
        $originCity = CityFactory::new()->create();

        /** @var City $destinationCity */
        $destinationCity = CityFactory::new()->create();

        return [
            'airline_id' => $airline->id,
            'origin_city_id' => $originCity->id,
            'destination_city_id' => $destinationCity->id,
            'departure_time' => $departureTime,
            'arrival_time' => $arrivalTime,
        ];
    }
}
