# About

This is a very simple trait that add auto-sorting to Eloquent models.

## Usage

Import the trait like:

```
<?php

namespace App;

use KevinRuscoe\AutoSortingModelTrait\AutoSortingModelTrait as IsAutoSortable;

class User
{
    use IsAutoSortable;
}

```

By default the trait will look for the `sortBy` and `sort` querystring values to do the sorting. You can overwrite the `sortByKey` and `sortKey` properties of your model to change these.

```
<?php

namespace App;

use KevinRuscoe\AutoSortingModelTrait\AutoSortingModelTrait as IsAutoSortable;

class User
{
    use IsAutoSortable;

    protectd $sortByKey = 'orderBy';

    protectd $sortKey = 'order';
}

```

The model will now get auto-sorted when a querystring like `orderBy=id&order=desc` is found.