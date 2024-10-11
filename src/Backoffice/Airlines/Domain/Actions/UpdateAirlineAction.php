<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\Domain\Actions;

use Lightit\Backoffice\Airlines\Domain\DataTransferObjects\AirlineDto;
use Lightit\Backoffice\Airlines\Domain\Models\Airline;

class UpdateAirlineAction
{
    public function execute(AirlineDto $airlineDto, Airline $airline): Airline
    {
        $airline->update([
            'name' => $airlineDto->getName(),
            'description' => $airlineDto->getDescription(),
        ]);

        return $airline;
    }
}
