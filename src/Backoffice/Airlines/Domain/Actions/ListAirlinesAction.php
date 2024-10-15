<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\Domain\Actions;

use Illuminate\Pagination\LengthAwarePaginator;
use Lightit\Backoffice\Airlines\Domain\Models\Airline;
use Spatie\QueryBuilder\QueryBuilder;

class ListAirlinesAction
{
    /**
     * @return LengthAwarePaginator<Airline>
     */
    public function execute(): LengthAwarePaginator
    {
        /** @var LengthAwarePaginator<Airline> $paginator */
        $paginator = QueryBuilder::for(Airline::class)
            ->defaultSort('-id')
            ->allowedSorts('id', 'name', 'description')
            ->paginate();

        return $paginator;
    }
}
