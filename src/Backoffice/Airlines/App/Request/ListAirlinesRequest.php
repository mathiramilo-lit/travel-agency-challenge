<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\App\Request;

use Illuminate\Foundation\Http\FormRequest;
use Lightit\Backoffice\Airlines\Domain\DataTransferObjects\AirlineFilterDto;

class ListAirlinesRequest extends FormRequest
{
    public const PAGE_SIZE = 'page_size';
    public const SORT_BY = 'sort_by';
    public const ORDER = 'order';

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            self::PAGE_SIZE => ['nullable', 'integer', 'min:1', 'max:50'],
            self::SORT_BY => ['nullable', 'in:id,name,description,updated_at,created_at'],
            self::ORDER => ['nullable', 'in:asc,desc'],
        ];
    }

    public function toDto(): AirlineFilterDto
    {
        $pageSize = is_numeric($this->input(self::PAGE_SIZE)) ? (int) $this->input(self::PAGE_SIZE) : 10;
        $sortBy = is_string($this->input(self::SORT_BY)) ? $this->input(self::SORT_BY) : 'id';
        $order = $this->input(self::ORDER);

        if (! is_string($order) || ! in_array(strtolower($order), ['asc', 'desc'], true)) {
            $order = 'asc';
        }

        return new AirlineFilterDto(
            pageSize: $pageSize,
            sortBy: $sortBy,
            order: $order,
        );
    }
}
