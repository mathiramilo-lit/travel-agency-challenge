<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Lightit\Backoffice\Airlines\Domain\Models\Airline;
use Lightit\Backoffice\Flights\Domain\Models\Flight;

/**
 * @property int                             $id
 * @property string                          $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Airline> $airlines
 * @property-read int|null                                               $airlines_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Flight>  $incoming_flights
 * @property-read int|null                                               $incoming_flights_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Flight>  $outgoing_flights
 * @property-read int|null                                               $outgoing_flights_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City query()
 * @method static \Illuminate\Database\Eloquent\Builder|City whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class City extends Model
{
    protected $guarded = ['id'];

    /**
     * @return BelongsToMany<Airline>
     */
    public function airlines(): BelongsToMany
    {
        return $this->belongsToMany(Airline::class);
    }

    /**
     * @return HasMany<Flight>
     */
    public function outgoing_flights(): HasMany
    {
        return $this->hasMany(Flight::class, foreignKey: 'origin_city_id');
    }

    /**
     * @return HasMany<Flight>
     */
    public function incoming_flights(): HasMany
    {
        return $this->hasMany(Flight::class, foreignKey: 'destination_city_id');
    }
}
