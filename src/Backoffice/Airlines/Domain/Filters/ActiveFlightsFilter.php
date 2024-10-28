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
class ActiveFlightsFilter implements Filter
{
    /**
     * @param Builder<TModelClass> $query
     *
     * @return Builder<TModelClass>
     */
    public function __invoke(Builder $query, mixed $value, string $property): Builder
    {
        $count = (int) $value;

        return $query->has('flights', '>=', $count);
    }
}
