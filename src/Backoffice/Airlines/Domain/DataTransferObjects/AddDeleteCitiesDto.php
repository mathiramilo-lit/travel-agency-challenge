<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\Domain\DataTransferObjects;

readonly class AddDeleteCitiesDto
{
    /**
     * @param int[] $cities Array of city IDs.
     */
    public function __construct(
        private array $cities,
    ) {
    }

    /**
     * Get the list of city IDs.
     *
     * @return int[]
     */
    public function getCities(): array
    {
        return $this->cities;
    }
}
