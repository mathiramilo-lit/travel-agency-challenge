<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Lightit\Backoffice\Cities\Domain\Models\City;

/**
 *
 *
 * @property int                             $id
 * @property string                          $name
 * @property string                          $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|City    newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City    newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City    query()
 * @method static \Illuminate\Database\Eloquent\Builder|City    whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City    whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City    whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City    whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Airline whereDescription($value)
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, City> $cities
 * @property-read int|null $cities_count
 *
 * @mixin \Eloquent
 */
class Airline extends Model
{
    protected $guarded = ['id'];

    /**
     * @return HasMany<City>
     */
    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }
}
