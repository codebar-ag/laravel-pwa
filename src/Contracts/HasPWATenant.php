<?php

namespace CodebarAg\LaravelPWA\Contracts;

interface HasPWATenant
{
    public function getTenantModel(): ?PWA;
}
