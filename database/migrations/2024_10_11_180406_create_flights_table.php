<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Lightit\Backoffice\Airlines\Domain\Models\Airline;
use Lightit\Backoffice\Cities\Domain\Models\City;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Airline::class)
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignIdFor(City::class, 'origin_city_id')
                ->constrained('cities')
                ->cascadeOnDelete();
            $table->foreignIdFor(City::class, 'destination_city_id')
                ->constrained('cities')
                ->cascadeOnDelete();

            $table->timestamp('departure_time');
            $table->timestamp('arrival_time');
            $table->timestamps();
        });

        // Check departure_time < arrival_time
        // DB::statement('ALTER TABLE flights ADD CONSTRAINT check_departure_before_arrival CHECK (departure_time < arrival_time)');
    }

    public function down(): void
    {
        Schema::dropIfExists('flights');
        // DB::statement('ALTER TABLE flights DROP CONSTRAINT IF EXISTS check_departure_before_arrival');
    }
};
