<?php

namespace CodebarAg\LaravelPWA\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \CodebarAg\LaravelPWA\LaravelPWA
 */
class LaravelPWA extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \CodebarAg\LaravelPWA\LaravelPWA::class;
    }
}
