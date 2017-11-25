<?php

function sortLink($key)
{
	return request()->fullUrlWithQuery([
		'sortBy' => $key,
		'sort' => (request('sort', 'desc') == 'desc') ?
			'asc' :
			'desc'
	]);
}
