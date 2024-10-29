<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\Domain\DataTransferObjects;

readonly class AddDeleteCitiesDto
{
    public function __construct(
        private array $cities,
    ) {
    }

    public function getCities(): array
    {
        return $this->cities;
    }
}
