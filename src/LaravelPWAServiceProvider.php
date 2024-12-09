<?php

namespace CodebarAg\LaravelPWA;

use CodebarAg\LaravelPWA\Commands\LaravelPWACommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelPWAServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-pwa')
            ->hasConfigFile()
            ->hasRoute('pwa')
            ->hasMigrations(
                'add_pwa_column_to_tenant_model_table',
            )
            ->hasCommand(LaravelPWACommand::class);
    }
}
