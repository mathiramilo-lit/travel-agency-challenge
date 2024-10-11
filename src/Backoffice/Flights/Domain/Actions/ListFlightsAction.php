<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\Domain\Actions;

use Illuminate\Pagination\LengthAwarePaginator;
use Lightit\Backoffice\Flights\Domain\DataTransferObjects\FlightFilterDto;
use Lightit\Backoffice\Flights\Domain\Models\Flight;
use Spatie\QueryBuilder\QueryBuilder;

class ListFlightsAction
{
    /**
     * @return LengthAwarePaginator<Flight>
     */
    public function execute(FlightFilterDto $flightFilterDto): LengthAwarePaginator
    {
        /** @var LengthAwarePaginator<Flight> $paginator */
        $paginator = QueryBuilder::for(Flight::class)
            ->orderBy($flightFilterDto->getSortBy(), $flightFilterDto->getOrder())
            ->paginate($flightFilterDto->getPageSize());

        return $paginator;
    }
}
