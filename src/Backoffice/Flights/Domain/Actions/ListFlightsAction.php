<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\Domain\Actions;

use Illuminate\Pagination\LengthAwarePaginator;
use Lightit\Backoffice\Flights\Domain\Models\Flight;
use Spatie\QueryBuilder\QueryBuilder;

class ListFlightsAction
{
    /**
     * @return LengthAwarePaginator<Flight>
     */
    public function execute(): LengthAwarePaginator
    {
        /** @var LengthAwarePaginator<Flight> $paginator */
        $paginator = QueryBuilder::for(Flight::class)
            ->defaultSort('-id')
            ->allowedSorts('id', 'departure_at', 'arrival_at')
            ->paginate();

        return $paginator;
    }
}
