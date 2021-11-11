<?php

use Illuminate\Support\Str;

function active_class($path, $active = 'active')
{
    return call_user_func_array('Request::is', (array) $path) ? $active : '';
}

function is_active_route($path)
{
    return call_user_func_array('Request::is', (array) $path) ? 'true' : 'false';
}

function show_class($path)
{
    return call_user_func_array('Request::is', (array) $path) ? 'show' : '';
}

function activeClassByRoute($routeName)
{
    return request()->routeIs($routeName) ? 'active' : '';
}

function slug($string)
{
    return Str::slug($string);
}

function unSlug($slug)
{
    return str_replace('-', ' ', $slug);
}