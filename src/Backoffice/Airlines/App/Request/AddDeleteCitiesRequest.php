<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\App\Request;

use Illuminate\Foundation\Http\FormRequest;
use Lightit\Backoffice\Airlines\Domain\DataTransferObjects\AddDeleteCitiesDto;

class AddDeleteCitiesRequest extends FormRequest
{
    public const CITIES = 'cities';

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            self::CITIES => ['required', 'array', 'min:1'],
            self::CITIES . '.*' => ['integer', 'exists:cities,id'],
        ];
    }

    public function toDto(): AddDeleteCitiesDto
    {
        $cities = (array) $this->input(self::CITIES);

        return new AddDeleteCitiesDto(
            cities: array_map(static fn($city) => (int) $city, $cities),
        );
    }
}
