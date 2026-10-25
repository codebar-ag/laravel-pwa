<?php

use CodebarAg\LaravelPWA\PWAManifestService;
use CodebarAg\LaravelPWA\Tests\Fixtures\Tenant;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;

beforeEach(function () {
    config()->set('cache.default', 'array');
    config()->set('pwa.cache.store', 'array');
    config()->set('pwa.manifest.name', 'Laravel');
    config()->set('pwa.manifest.short_name', 'Laravel');

    Schema::create('tenants', function (Blueprint $table) {
        $table->id();
        $table->json('pwa')->nullable();
    });
});

it('builds the default manifest from the config', function () {
    $manifest = PWAManifestService::get();

    expect($manifest)
        ->toHaveKeys(['name', 'short_name', 'start_url', 'icons', 'shortcuts', 'screenshots'])
        ->and($manifest['name'])->toBe('Laravel')
        ->and($manifest['short_name'])->toBe('Laravel')
        ->and($manifest['theme_color'])->toBe(config('pwa.manifest.theme_color'))
        ->and($manifest['icons'])->toBe(config('pwa.manifest.icons'))
        ->and($manifest['screenshots'])->toBe(config('pwa.manifest.screenshots'));
});

it('builds the manifest from the tenant settings', function () {
    $tenant = Tenant::create([
        'pwa' => [
            'name' => 'Acme',
            'short_name' => 'ACM',
            'theme_color' => '#ff0000',
            'screenshots' => [
                ['src' => '/acme.png', 'sizes' => '1080x1920'],
            ],
        ],
    ]);

    $manifest = PWAManifestService::get(Tenant::findOrFail($tenant->getKey()));

    expect($manifest['name'])->toBe('Acme')
        ->and($manifest['short_name'])->toBe('ACM')
        ->and($manifest['theme_color'])->toBe('#ff0000')
        ->and($manifest['screenshots'])->toBe([
            ['src' => '/acme.png', 'sizes' => '1080x1920'],
        ]);
});

it('caches the default manifest', function () {
    $first = PWAManifestService::get();

    config()->set('pwa.manifest.name', 'Changed');

    expect(PWAManifestService::get())->toBe($first)
        ->and(Cache::has('pwa-manifest'))->toBeTrue();
});
