<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\Domain\Actions;

use Illuminate\Support\Collection;
use Lightit\Backoffice\Airlines\Domain\DataTransferObjects\AddDeleteCitiesDto;
use Lightit\Backoffice\Airlines\Domain\Models\Airline;
use Lightit\Backoffice\Cities\Domain\Models\City;

class AddCitiesAction
{
    /**
     * @return Collection<int, City>
     */
    public function execute(AddDeleteCitiesDto $addDeleteCitiesDto, Airline $airline): Collection
    {
        $airline->cities()->syncWithoutDetaching($addDeleteCitiesDto->getCities());

        return $airline->cities()->get();
    }
}
