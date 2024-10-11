<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\Domain\Actions;

use Illuminate\Pagination\LengthAwarePaginator;
use Lightit\Backoffice\Cities\Domain\DataTransferObjects\CityFilterDto;
use Lightit\Backoffice\Cities\Domain\Models\City;
use Spatie\QueryBuilder\QueryBuilder;

class ListCitiesAction
{
    /**
     * @return LengthAwarePaginator<City>
     */
    public function execute(CityFilterDto $cityFilterDto): LengthAwarePaginator
    {
        /** @var LengthAwarePaginator<City> $paginator */
        $paginator = QueryBuilder::for(City::class)
            ->orderBy($cityFilterDto->getSortBy(), $cityFilterDto->getOrder())
            ->paginate($cityFilterDto->getPageSize());

        return $paginator;
    }
}
