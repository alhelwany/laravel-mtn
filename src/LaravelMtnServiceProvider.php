<?php

namespace Alhelwany\LaravelMtn;

use Illuminate\Container\Container;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelMtnServiceProvider extends PackageServiceProvider
{
	public function configurePackage(Package $package): void
	{
		$package
			->name('laravel-mtn')
			->hasConfigFile();
			
		Container::getInstance()->singleton(MTNClient::class, function () {
			return MTNClient::getInstance();
		});
	}
}
