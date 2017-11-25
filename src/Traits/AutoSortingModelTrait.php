<?php

namespace KevinRuscoe\AutoSortingModel\Trait;

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

            $sortByKey = $builder->getModel()->sortByKey;
            $sortKey = $builder->getModel()->sortKey;

            $sortBy = request($sortByKey ?? 'sortBy', 'id');
            $sort = request($sortKey ?? 'sort', 'asc');

            $columnNames = Schema::getColumnListing(
                $builder->getModel()->getTable()
            );

            if (in_array($sortBy, $columnNames)) {
                $builder->orderBy($sortBy, $sort);
            }
        });
    }
}