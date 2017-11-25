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
            $sortColumn = request(
                config('autosortingmodel.sortColumnKey', 'sortColumn'),
                'id'
            );

            $sortDirection = request(
                config('autosortingmodel.sortDirectionKey', 'sortDirection'),
                'asc'
            );

            $columnNames = Schema::getColumnListing(
                $builder->getModel()->getTable()
            );

            if (in_array($sortColumn, $columnNames)) {
                $builder->orderBy($sortColumn, $sortDirection);
            }
        });
    }
}