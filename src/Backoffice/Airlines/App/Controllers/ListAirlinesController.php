<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Airlines\App\Request\ListAirlinesRequest;
use Lightit\Backoffice\Airlines\App\Transformers\AirlineTransformer;
use Lightit\Backoffice\Airlines\Domain\Actions\ListAirlinesAction;

class ListAirlinesController
{
    public function __invoke(
        ListAirlinesRequest $request,
        ListAirlinesAction $action,
    ): JsonResponse {
        $airlines = $action->execute($request);

        return responder()
            ->success($airlines, AirlineTransformer::class)
            ->respond();
    }
}
