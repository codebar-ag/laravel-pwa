<?php

declare(strict_types=1);

namespace CodebarAg\LaravelPWA\Casts;

use CodebarAg\LaravelPWA\Dto\PWA as PWADto;
use Illuminate\Database\Eloquent\Model;

class PWA
{
    public function get(Model $model, string $key, mixed $value, array $attributes): PWADto
    {
        return PWADto::fromArray(json_decode($value ?? '', true) ?? []);
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  array<string, mixed>  $attributes
     * @return array<string, string>
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): array
    {
        if (! $value instanceof PWADto) {
            $value = PWADto::fromArray($value);
        }

        return [
            $key => $value->toArray(),
        ];
    }
}
