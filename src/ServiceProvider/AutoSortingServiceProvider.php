<?php

namespace KevinRuscoe\AutoSortingModel\ServiceProvider;

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
        Blade::directive('sortLink', function ($key) {
            return getSortLink($key);
        });
    }
}