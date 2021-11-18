<?php

namespace App\Utillities;

use Illuminate\Support\Facades\Route;

class RouteList
{
    public static function publicRoute()
    {
        $routes = Route::getRoutes();
        $arr = [];

        foreach ($routes as $route) {
            if (count($route->methods) > 1) {
                if ($route->methods[0] == 'GET' &&
                    (
                        !str_contains($route->uri, 'livewire/') &&
                        !str_contains($route->uri, 'debugbar/') &&
                        !str_contains($route->uri, 'admin') &&
                        !str_contains($route->uri, 'files') &&
                        !str_contains($route->uri, 'images') &&
                        !str_contains($route->uri, 'videos') &&
                        !str_contains($route->uri, 'api/')
                    )
                ) {
                    array_push($arr, [
                        'url' => $route->uri,
                        'route_name' => $route->getName(),
                    ]);
                }
            }
        }

        return $arr;
    }
}