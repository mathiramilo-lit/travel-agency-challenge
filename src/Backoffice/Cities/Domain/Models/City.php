<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Lightit\Backoffice\Airlines\Domain\Models\Airline;

/**
 *
 *
 * @property int                             $id
 * @property string                          $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City query()
 * @method static \Illuminate\Database\Eloquent\Builder|City whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereUpdatedAt($value)
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, City> $airlines
 * @property-read int|null $airlines_count
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
}
