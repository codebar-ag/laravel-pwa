<?php

namespace CodebarAg\LaravelPWA\Actions;

use CodebarAg\LaravelPWA\Contracts\PWA;
use CodebarAg\LaravelPWA\PWAManifestService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class PwaManifest
{
    /**
     * Return the PWA manifest as JSON.
     *
     * @throws \Exception
     */
    public static function handle(): array
    {
        $tenant = self::getTenant();

        return PWAManifestService::get($tenant);
    }

    /**
     * Retrieve the tenant instance for the authenticated user.
     *
     * @throws \Exception
     */
    protected static function getTenant(): ?PWA
    {
        $tenantModel = self::getTenantModel();

        if (! $tenantModel) {
            return null;
        }

        $tenant = Auth::user()->getPWATenant();

        if (is_null($tenant)) {
            return null;
        }

        if (! $tenant instanceof $tenantModel) {
            throw new \Exception('User method getPWATenant must return an instance of '.$tenantModel);
        }

        return $tenant;
    }

    /**
     * Get the tenant model from configuration.
     *
     * @throws \Exception
     */
    protected static function getTenantModel(): ?PWA
    {
        if (! Auth::check() || ! config('pwa.tenant.enabled')) {
            return null;
        }

        $tenantClass = config('pwa.tenant.model');
        $tenantModel = new $tenantClass;

        if (! $tenantModel instanceof PWA) {
            throw new \Exception('Tenant model must implement CodebarAg\LaravelPWA\Contracts\PWA');
        }

        return $tenantModel;
    }
}
