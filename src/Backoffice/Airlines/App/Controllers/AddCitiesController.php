<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Airlines\App\Request\AddDeleteCitiesRequest;
use Lightit\Backoffice\Airlines\Domain\Actions\AddCitiesAction;
use Lightit\Backoffice\Airlines\Domain\Models\Airline;

class AddCitiesController
{
    public function __invoke(
        AddDeleteCitiesRequest $request,
        AddCitiesAction $addCitiesAction,
        Airline $airline,
    ): JsonResponse {
        $updatedCities = $addCitiesAction->execute($request->toDto(), $airline);

        return responder()
            ->success($updatedCities)
            ->respond();
    }
}
