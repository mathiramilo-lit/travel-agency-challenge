<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Airlines\App\Request\StoreAirlineRequest;
use Lightit\Backoffice\Airlines\App\Transformers\AirlineTransformer;
use Lightit\Backoffice\Airlines\Domain\Actions\UpdateAirlineAction;
use Lightit\Backoffice\Airlines\Domain\Models\Airline;

class UpdateAirlineController
{
    public function __invoke(
        StoreAirlineRequest $request,
        UpdateAirlineAction $updateAirlineAction,
        Airline $airline,
    ): JsonResponse {
        $updatedAirline = $updateAirlineAction->execute($request->toDto(), $airline);

        return responder()
            ->success($updatedAirline, AirlineTransformer::class)
            ->respond(JsonResponse::HTTP_CREATED);
    }
}
