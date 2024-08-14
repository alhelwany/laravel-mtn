<?php

namespace Alhelwany\LaravelMtn\Commands;

use Illuminate\Console\Command;

class LaravelMtnCommand extends Command
{
    public $signature = 'laravel-mtn';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
