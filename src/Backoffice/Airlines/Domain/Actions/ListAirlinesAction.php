<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\Domain\Actions;

use Illuminate\Pagination\LengthAwarePaginator;
use Lightit\Backoffice\Airlines\App\Request\ListAirlinesRequest;
use Lightit\Backoffice\Airlines\Domain\Models\Airline;
use Spatie\QueryBuilder\QueryBuilder;

class ListAirlinesAction
{
    /**
     * @return LengthAwarePaginator<Airline>
     */
    public function execute(ListAirlinesRequest $request): LengthAwarePaginator
    {
        $pageSize = (int) $request->query('page_size', '10');
        $sortBy = is_string($request->query('sort_by')) ? $request->query('sort_by') : 'id';
        $order = $request->query('order');

        if (! is_string($order) || ! in_array(strtolower($order), ['asc', 'desc'], true)) {
            $order = 'asc';
        }

        /** @var LengthAwarePaginator<Airline> $paginator */
        $paginator = QueryBuilder::for(Airline::class)
            ->orderBy($sortBy, $order)
            ->paginate($pageSize);

        return $paginator;
    }
}
