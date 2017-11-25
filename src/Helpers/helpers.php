<?php

function sortLink($key)
{
	return request()->fullUrlWithQuery([
		config('autosortingmodel.sortByKey', 'sortBy') => $key,
		config('autosortingmodel.sortOrderKey', 'sort') => (request('sort', 'desc') == 'desc') ?
			'asc' :
			'desc'
	]);
}
