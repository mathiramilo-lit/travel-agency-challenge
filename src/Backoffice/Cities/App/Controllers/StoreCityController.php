<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Cities\App\Request\StoreCityRequest;
use Lightit\Backoffice\Cities\App\Transformers\CityTransformer;
use Lightit\Backoffice\Cities\Domain\Actions\StoreCityAction;

class StoreCityController
{
    public function __invoke(StoreCityRequest $request, StoreCityAction $storeCityAction): JsonResponse
    {
        $city = $storeCityAction->execute($request->toDto());

        return responder()
            ->success($city, CityTransformer::class)
            ->respond(JsonResponse::HTTP_CREATED);
    }
}
