<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Airlines\Domain\Actions\ListAllowedCitiesAction;
use Lightit\Backoffice\Airlines\Domain\Models\Airline;

class ListAllowedCitiesController
{
    public function __invoke(
        ListAllowedCitiesAction $action,
        Airline $airline,
    ): JsonResponse {
        $allowedCities = $action->execute($airline);

        return responder()
            ->success($allowedCities)
            ->respond();
    }
}
