<?php

namespace KevinRuscoe\AutoSortingModel\Traits;

use Illuminate\Database\Eloquent\Builder;

use Schema;

trait AutoSortingModelTrait
{
    /**
     * Boots the model and applies the 'auto-sorting' scope.
     *
     * @return void
     */
    protected static function bootAutoSortingModelTrait()
    {
        static::addGlobalScope('auto-sorting-model', function (Builder $builder) {
            $sortByKey = config(
                'autosortingmodel.sortByKey', 
                $builder->getModel()->sortByKey
            );
            
            $sortOrderKey = config(
                'autosortingmodel.sortOrderKey',
                $builder->getModel()->sortOrderKey
            );

            $sortBy = request($sortByKey ?? 'sortBy', 'id');
            $sort = request($sortOrderKey ?? 'sort', 'asc');

            $columnNames = Schema::getColumnListing(
                $builder->getModel()->getTable()
            );

            if (in_array($sortBy, $columnNames)) {
                $builder->orderBy($sortBy, $sort);
            }
        });
    }
}