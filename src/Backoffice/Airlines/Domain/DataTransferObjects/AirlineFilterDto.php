<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\Domain\DataTransferObjects;

class AirlineFilterDto
{
    public function __construct(
        private readonly int $pageSize,
        private readonly string $sortBy,
        private readonly string $order,
    ) {
    }

    public function getPageSize(): int
    {
        return $this->pageSize;
    }

    public function getSortBy(): string
    {
        return $this->sortBy;
    }

    public function getOrder(): string
    {
        return $this->order;
    }
}
