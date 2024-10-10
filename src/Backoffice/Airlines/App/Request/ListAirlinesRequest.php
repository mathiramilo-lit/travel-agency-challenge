<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\App\Request;

use Illuminate\Foundation\Http\FormRequest;

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
}
