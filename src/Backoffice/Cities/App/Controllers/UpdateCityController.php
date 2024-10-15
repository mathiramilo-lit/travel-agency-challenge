<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Cities\App\Request\StoreCityRequest;
use Lightit\Backoffice\Cities\App\Transformers\CityTransformer;
use Lightit\Backoffice\Cities\Domain\Actions\UpdateCityAction;
use Lightit\Backoffice\Cities\Domain\Models\City;

class UpdateCityController
{
    public function __invoke(StoreCityRequest $request, UpdateCityAction $updateCityAction, City $city): JsonResponse
    {
        $updatedCity = $updateCityAction->execute($request->toDto(), $city);

        return responder()
            ->success($updatedCity, CityTransformer::class)
            ->respond();
    }
}
