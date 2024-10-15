<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
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
        $departureAt = fake()->dateTimeBetween('-1 year', '+1 year');
        $arrivalAt = (clone $departureAt)->modify('+' . fake()->numberBetween(1, 48) . ' hours'); // Add 1 to 48 hours

        return [
            'airline_id' => AirlineFactory::new(),
            'origin_city_id' => CityFactory::new(),
            'destination_city_id' => CityFactory::new(),
            'departure_at' => $departureAt,
            'arrival_at' => $arrivalAt,
        ];
    }
}
