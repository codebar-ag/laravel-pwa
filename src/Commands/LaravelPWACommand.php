<?php

namespace CodebarAg\LaravelPWA\Commands;

use Illuminate\Console\Command;

class LaravelPWACommand extends Command
{
    public $signature = 'laravel-pwa';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
