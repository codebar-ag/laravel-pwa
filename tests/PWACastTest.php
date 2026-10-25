<?php

use CodebarAg\LaravelPWA\Dto\PWA as PWADto;
use CodebarAg\LaravelPWA\Tests\Fixtures\Tenant;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

beforeEach(function () {
    config()->set('pwa.manifest.name', 'Laravel');
    config()->set('pwa.manifest.short_name', 'Laravel');

    Schema::create('tenants', function (Blueprint $table) {
        $table->id();
        $table->json('pwa')->nullable();
    });
});

it('stores the pwa settings as json', function () {
    $tenant = Tenant::create([
        'pwa' => [
            'name' => 'Acme',
            'short_name' => 'ACM',
        ],
    ]);

    $raw = $tenant->getAttributes()['pwa'];

    expect($raw)->toBeString()
        ->and(json_decode($raw, true))->toMatchArray([
            'short_name' => 'ACM',
        ]);
});

it('restores the pwa settings from the database', function () {
    $tenant = Tenant::create([
        'pwa' => [
            'name' => 'Acme',
            'short_name' => 'ACM',
            'theme_color' => '#ff0000',
        ],
    ]);

    $pwa = Tenant::findOrFail($tenant->getKey())->pwa;

    expect($pwa)->toBeInstanceOf(PWADto::class)
        ->and($pwa->shortName)->toBe('ACM')
        ->and($pwa->theme_color)->toBe('#ff0000');
});

it('falls back to the config when no pwa settings are stored', function () {
    $tenant = Tenant::create();

    $pwa = Tenant::findOrFail($tenant->getKey())->pwa;

    expect($pwa)->toBeInstanceOf(PWADto::class)
        ->and($pwa->theme_color)->toBe(config('pwa.manifest.theme_color'));
});
