<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Lightit\Backoffice\Airlines\Domain\Models\Airline;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<Airline>
 */
class AirlineFactory extends Factory
{
    protected $model = Airline::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'description' => fake()->text(150),
        ];
    }
}
