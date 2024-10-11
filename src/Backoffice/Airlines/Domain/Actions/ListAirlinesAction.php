<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\Domain\Actions;

use Illuminate\Pagination\LengthAwarePaginator;
use Lightit\Backoffice\Airlines\Domain\DataTransferObjects\AirlineFilterDto;
use Lightit\Backoffice\Airlines\Domain\Models\Airline;
use Spatie\QueryBuilder\QueryBuilder;

class ListAirlinesAction
{
    /**
     * @return LengthAwarePaginator<Airline>
     */
    public function execute(AirlineFilterDto $airlineFilterDto): LengthAwarePaginator
    {
        /** @var LengthAwarePaginator<Airline> $paginator */
        $paginator = QueryBuilder::for(Airline::class)
            ->orderBy($airlineFilterDto->getSortBy(), $airlineFilterDto->getOrder())
            ->paginate($airlineFilterDto->getPageSize());

        return $paginator;
    }
}
