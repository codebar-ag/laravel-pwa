<?php

namespace CodebarAg\LaravelPWA\Http\Controllers;

use CodebarAg\LaravelPWA\Contracts\PWA;
use CodebarAg\LaravelPWA\PWAManifestService;
use Illuminate\Support\Facades\Auth;

class PwaController
{
    /**
     * Return the PWA manifest as JSON.
     *
     * @throws \Exception
     */
    public function manifestJson()
    {
        $tenant = $this->getTenant();

        ray($tenant);

        $manifest = PWAManifestService::get($tenant);

        return response()->json($manifest);
    }

    /**
     * Show the offline page.
     */
    public function offline()
    {
        return view('offline');
    }

    /**
     * Retrieve the tenant instance for the authenticated user.
     *
     * @throws \Exception
     */
    protected function getTenant(): ?PWA
    {
        $tenantModel = $this->getTenantModel();

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
    protected function getTenantModel(): ?PWA
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
