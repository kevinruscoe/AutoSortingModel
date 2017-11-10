<?php

namespace KevinRuscoe\AutoSortingModel;

use Illuminate\Database\Eloquent\Builder;

use Schema;

trait AutoSortingModel
{
    /**
     * Boots the model and applies the 'auto-sorting' scope.
     *
     * @return void
     */
    protected static function bootAutoSortingModel()
    {
        static::addGlobalScope('auto-sorting', function (Builder $builder) {

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