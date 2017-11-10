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
            $orderBy = request('orderBy', 'id');
            $order = request('order', 'asc');

            $columnNames = Schema::getColumnListing(
                $builder->getModel()->getTable()
            );

            if (in_array($orderBy, $columnNames)) {
                $builder->orderBy($orderBy, $order);
            }
        });
    }
}