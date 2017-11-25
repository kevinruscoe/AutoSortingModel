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

By default the trait will look for the `sortColumn` and `sortDirection` querystring values to do the
 sorting. If you publish the provided config file you can overwrite these.

There's a helper function to help you craft sorting links using `sortLink($modelAttribute)`.