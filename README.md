# About

This is a very simple trait that add auto-sorting to Eloquent models.

## Usage

Import the trait like:

```
<?php

namespace App;

use KevinRuscoe\AutoSortingModel\Traits\AutoSortingModelTrait as AutoSortable;

class User
{
    use AutoSortable;
}

```

By default the trait will look for the `sortBy` and `sort` querystring values to do the sorting. You can overwrite the `sortByKey` and `sortOrderKey` properties of your model to change these.

```
<?php

namespace App;

use KevinRuscoe\AutoSortingModel\Traits\AutoSortingModelTrait as AutoSortable;

class User
{
    use AutoSortable;

    protected $sortByKey = 'orderBy';

    protected $sortOrderKey = 'order';
}

```

The model will now get auto-sorted when a querystring like `orderBy=id&order=desc` is found.