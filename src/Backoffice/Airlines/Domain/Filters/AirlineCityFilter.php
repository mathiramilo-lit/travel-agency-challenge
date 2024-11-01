<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\Domain\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\QueryBuilder\Filters\Filter;

/**
 * @template TModelClass of Model
 *
 * @implements Filter<TModelClass>
 */
class AirlineCityFilter implements Filter
{
    /**
     * @param Builder<TModelClass> $query
     *
     * @return Builder<TModelClass>
     */
    public function __invoke(Builder $query, mixed $value, string $property): Builder
    {
        return $query->whereHas('flights', function (Builder $query) use ($value) {
            $query
                ->where('origin_city_id', $value)
                ->orWhere('destination_city_id', $value);
        });
    }
}
