<?php

use CodebarAg\LaravelPWA\Http\Controllers\PwaController;
use Illuminate\Support\Facades\Route;

Route::as('pwa.')
    ->middleware('web')
    ->group(function () {
        Route::get('/manifest.json', [PwaController::class, 'manifestJson'])
            ->name('manifest')
            ->withoutMiddleware([
                'auth:sanctum',
                config('jetstream.auth_session'),
                'verified',
            ]);

        Route::get('/pwa.js', [PwaController::class, 'pwaJS'])
            ->name('pwa-js')
            ->withoutMiddleware([
                'auth:sanctum',
                config('jetstream.auth_session'),
                'verified',
            ]);

        Route::get('/offline/', [PwaController::class, 'offline'])->name('offline');
    });
