<?php

namespace Alhelwany\LaravelMtn;

use Alhelwany\LaravelMtn\Commands\LaravelMtnCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelMtnServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-mtn')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel_mtn_table')
            ->hasCommand(LaravelMtnCommand::class);
    }
}
