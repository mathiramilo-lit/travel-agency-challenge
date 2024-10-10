<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\Domain\Actions;

use Illuminate\Pagination\LengthAwarePaginator;
use Lightit\Backoffice\Cities\App\Request\ListCitiesRequest;
use Lightit\Backoffice\Cities\Domain\Models\City;
use Spatie\QueryBuilder\QueryBuilder;

class ListCitiesAction
{
    /**
     * @return LengthAwarePaginator<City>
     */
    public function execute(ListCitiesRequest $request): LengthAwarePaginator
    {
        $pageSize = (int) $request->query('page_size', '10');
        $sortBy = is_string($request->query('sort_by')) ? $request->query('sort_by') : 'id';
        $order = $request->query('order');

        if (! is_string($order) || ! in_array(strtolower($order), ['asc', 'desc'], true)) {
            $order = 'asc';
        }

        /** @var LengthAwarePaginator<City> $paginator */
        $paginator = QueryBuilder::for(City::class)
            ->orderBy($sortBy, $order)
            ->paginate($pageSize);

        return $paginator;
    }
}
