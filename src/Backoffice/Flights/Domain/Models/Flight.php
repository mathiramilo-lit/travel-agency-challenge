<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Lightit\Backoffice\Airlines\Domain\Models\Airline;
use Lightit\Backoffice\Cities\Domain\Models\City;

/**
 * @property int                             $id
 * @property int                             $airline_id
 * @property int                             $origin_city_id
 * @property int                             $destination_city_id
 * @property \Illuminate\Support\Carbon      $departure_time
 * @property \Illuminate\Support\Carbon      $arrival_time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Airline                    $airline
 * @property-read City                       $destinationCity
 * @property-read City                       $originCity
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Flight newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Flight newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Flight query()
 * @method static \Illuminate\Database\Eloquent\Builder|Flight whereAirlineId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flight whereArrivalTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flight whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flight whereDepartureTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flight whereDestinationCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flight whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flight whereOriginCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flight whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Flight extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'departure_time' => 'datetime',
        'arrival_time' => 'datetime',
    ];

    /**
     * Get the airline associated with the flight.
     *
     * @return BelongsTo<Airline, Flight>
     */
    public function airline(): BelongsTo
    {
        return $this->belongsTo(Airline::class);
    }

    /**
     * Get the origin city associated with the flight.
     *
     * @return BelongsTo<City, Flight>
     */
    public function originCity(): BelongsTo
    {
        return $this->belongsTo(City::class, foreignKey: 'origin_city_id');
    }

    /**
     * Get the destination city associated with the flight.
     *
     * @return BelongsTo<City, Flight>
     */
    public function destinationCity(): BelongsTo
    {
        return $this->belongsTo(City::class, foreignKey: 'destination_city_id');
    }
}
