<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Cities\App\Request\ListCitiesRequest;
use Lightit\Backoffice\Cities\App\Transformers\CityTransformer;
use Lightit\Backoffice\Cities\Domain\Actions\ListCitiesAction;

class ListCitiesController
{
    public function __invoke(
        ListCitiesRequest $request,
        ListCitiesAction $action,
    ): JsonResponse {
        $cities = $action->execute($request);

        return responder()
            ->success($cities, CityTransformer::class)
            ->respond();
    }
}
