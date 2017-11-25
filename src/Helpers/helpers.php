<?php

function getSortLink($key)
{
	return request()->fullUrlWithQuery([
		'sortBy' => $key,
		'sort' => (request('sort', 'desc') == 'desc') ?
			'asc' :
			'desc'
	]);
}
