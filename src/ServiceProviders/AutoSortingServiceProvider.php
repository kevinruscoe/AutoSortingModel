<?php

namespace KevinRuscoe\AutoSortingModel\ServiceProviders;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AutoSortingModelServiceProvider extends ServiceProvider
{
    /**
     * Boot the service container.
     *
     * @return void
     */
    public function boot()
    {
		$this->publishes([
			__DIR__.'/../config/autosortingmodel.php' => config_path('autosortingmodel.php'),
		]);
    }
}