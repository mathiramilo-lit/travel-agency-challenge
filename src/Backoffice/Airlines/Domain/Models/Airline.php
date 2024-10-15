<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Lightit\Backoffice\Cities\Domain\Models\City;
use Lightit\Backoffice\Flights\Domain\Models\Flight;

/**
 * @property int                             $id
 * @property string                          $name
 * @property string                          $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, City>   $cities
 * @property-read int|null                                              $cities_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Flight> $flights
 * @property-read int|null                                              $flights_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Airline newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Airline newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Airline query()
 * @method static \Illuminate\Database\Eloquent\Builder|Airline whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Airline whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Airline whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Airline whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Airline whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Airline extends Model
{
    protected $guarded = ['id'];

    /**
     * @return BelongsToMany<City>
     */
    public function cities(): BelongsToMany
    {
        return $this->belongsToMany(City::class);
    }

    /**
     * @return HasMany<Flight>
     */
    public function flights(): HasMany
    {
        return $this->hasMany(Flight::class);
    }
}
