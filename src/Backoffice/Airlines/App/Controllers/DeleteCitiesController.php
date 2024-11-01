<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Airlines\App\Request\AddDeleteCitiesRequest;
use Lightit\Backoffice\Airlines\Domain\Actions\DeleteCitiesAction;
use Lightit\Backoffice\Airlines\Domain\Models\Airline;

class DeleteCitiesController
{
    public function __invoke(
        AddDeleteCitiesRequest $request,
        DeleteCitiesAction $deleteCitiesAction,
        Airline $airline,
    ): JsonResponse {
        $updatedCities = $deleteCitiesAction->execute($request->toDto(), $airline);

        return responder()
            ->success($updatedCities)
            ->respond();
    }
}
