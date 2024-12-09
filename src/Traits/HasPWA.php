<?php

declare(strict_types=1);

namespace CodebarAg\LaravelPWA\Traits;

use CodebarAg\LaravelPWA\Casts\PWA;

trait HasPWA
{
    public function initializeHasPWA(): void
    {
        $this->mergeCasts([
            'pwa' => PWA::class,
        ]);
    }
}
