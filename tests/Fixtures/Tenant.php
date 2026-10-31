<?php

namespace CodebarAg\LaravelPWA\Tests\Fixtures;

use CodebarAg\LaravelPWA\Contracts\PWA;
use CodebarAg\LaravelPWA\Traits\HasPWA;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model implements PWA
{
    use HasPWA;

    protected $table = 'tenants';

    protected $guarded = [];

    public $timestamps = false;
}
