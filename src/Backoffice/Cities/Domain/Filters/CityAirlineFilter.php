<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\Domain\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\QueryBuilder\Filters\Filter;

/**
 * @template TModelClass of Model
 *
 * @implements Filter<TModelClass>
 */
class CityAirlineFilter implements Filter
{
    /**
     * @param Builder<TModelClass> $query
     *
     * @return Builder<TModelClass>
     */
    public function __invoke(Builder $query, mixed $value, string $property): Builder
    {
        return $query->where(function (Builder $query) use ($value) {
            $query->whereHas('outgoingFlights', function (Builder $query) use ($value) {
                $query->where('airline_id', $value);
            })
                ->orWhereHas('incomingFlights', function (Builder $query) use ($value) {
                    $query->where('airline_id', $value);
                });
        });
    }
}
