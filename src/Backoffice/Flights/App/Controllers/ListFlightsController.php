<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Flights\App\Request\ListFlightsRequest;
use Lightit\Backoffice\Flights\App\Transformers\FlightTransformer;
use Lightit\Backoffice\Flights\Domain\Actions\ListFlightsAction;

class ListFlightsController
{
    public function __invoke(
        ListFlightsRequest $request,
        ListFlightsAction $action,
    ): JsonResponse {
        $flights = $action->execute($request->toDto());

        return responder()
            ->success($flights, FlightTransformer::class)
            ->respond();
    }
}
