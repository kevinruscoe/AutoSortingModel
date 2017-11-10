Import the `KevinRuscoe\AutoSortingModelTrait\AutoSortingModelTrait` into your model and everytime the "sortBy" and "sort" keys are found in the request it'll auto sort the results.

By default it'll look for the `sortBy` and `sort` querystring values to do the sorting. Overwrite the `sortByKey` and `sortKey` properties of your model to change these.