<?php

namespace Alhelwany\LaravelMtn\Tests;

use Alhelwany\LaravelMtn\LaravelMtnServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Alhelwany\\LaravelMtn\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelMtnServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
    }
}
