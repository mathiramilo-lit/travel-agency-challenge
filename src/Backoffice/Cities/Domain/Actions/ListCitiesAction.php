<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\Domain\Actions;

use Illuminate\Pagination\LengthAwarePaginator;
use Lightit\Backoffice\Cities\Domain\Models\City;
use Spatie\QueryBuilder\QueryBuilder;

class ListCitiesAction
{
    /**
     * @return LengthAwarePaginator<City>
     */
    public function execute(): LengthAwarePaginator
    {
        /** @var LengthAwarePaginator<City> $paginator */
        $paginator = QueryBuilder::for(City::class)
            ->defaultSort('-id')
            ->allowedSorts('id', 'name')
            ->paginate();

        return $paginator;
    }
}
