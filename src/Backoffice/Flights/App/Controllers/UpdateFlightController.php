<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Flights\App\Request\StoreFlightRequest;
use Lightit\Backoffice\Flights\App\Transformers\FlightTransformer;
use Lightit\Backoffice\Flights\Domain\Actions\UpdateFlightAction;
use Lightit\Backoffice\Flights\Domain\Models\Flight;

class UpdateFlightController
{
    public function __invoke(
        StoreFlightRequest $request,
        UpdateFlightAction $updateFlightAction,
        Flight $flight,
    ): JsonResponse {
        $updatedFlight = $updateFlightAction->execute($request->toDto(), $flight);

        return responder()
            ->success($updatedFlight, FlightTransformer::class)
            ->respond();
    }
}
