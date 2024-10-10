<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\App\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Lightit\Backoffice\Cities\App\Transformers\CityTransformer;
use Lightit\Backoffice\Cities\Domain\Actions\ListCitiesAction;

class ListCitiesController
{
    public function __invoke(
        Request $request,
        ListCitiesAction $action,
    ): JsonResponse {
        $cities = $action->execute();

        return responder()
            ->success($cities, CityTransformer::class)
            ->respond();
    }
}
