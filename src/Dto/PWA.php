<?php

declare(strict_types=1);

namespace CodebarAg\LaravelPWA\Dto;

use CodebarAg\LaravelPWA\Dto\Traits\ToIterable;
use Illuminate\Support\Arr;

class PWA
{
    use ToIterable;

    public function __construct(
        public string $name,
        public string $shortName,

        public string $start_url,

        public string $background_color,
        public string $theme_color,

        public string $display,
        public string $orientation,

        public string $status_bar,

        public array $icons,

        public array $splash,

        public ?array $shortcuts,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            name: Arr::get($data, 'name', config('pwa.manifest.name')).'TENANT',
            shortName: Arr::get($data, 'short_name', config('pwa.manifest.short_name')),

            start_url: Arr::get($data, 'start_url', config('pwa.manifest.start_url')),

            background_color: Arr::get($data, 'background_color', config('pwa.manifest.background_color')),
            theme_color: Arr::get($data, 'theme_color', config('pwa.manifest.theme_color')),

            display: Arr::get($data, 'display', config('pwa.manifest.display')),
            orientation: Arr::get($data, 'orientation', config('pwa.manifest.orientation')),

            status_bar: Arr::get($data, 'status_bar', config('pwa.manifest.status_bar')),

            icons: Arr::get($data, 'icons', config('pwa.manifest.icons')),

            splash: Arr::get($data, 'splash', config('pwa.manifest.splash')),

            shortcuts: Arr::get($data, 'shortcuts', config('pwa.manifest.shortcuts')),
        );
    }

    //     Custom conversions for toArray()
    private function convertInstances(mixed $value): mixed
    {
        //        if ($value instanceof SomeEnumOrClass) {
        //            return $value->getSomeConvertsionMethod();
        //        }

        return $value;
    }
}
