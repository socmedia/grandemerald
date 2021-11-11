<?php

namespace App\Http\Controllers;

class MainController extends Controller
{
    /**
     * Show homepage on company profile
     *
     * @return void
     */
    public function index()
    {
        // $routes = Route::getRoutes();
        // $arr = [];

        // foreach ($routes as $route) {
        //     if (count($route->methods) > 1) {
        //         if ($route->methods[0] == 'GET' &&
        //             (
        //                 !str_contains($route->uri, 'livewire/') &&
        //                 !str_contains($route->uri, 'debugbar/') &&
        //                 !str_contains($route->uri, 'admin') &&
        //                 !str_contains($route->uri, 'files') &&
        //                 !str_contains($route->uri, 'images') &&
        //                 !str_contains($route->uri, 'videos') &&
        //                 !str_contains($route->uri, 'api/')
        //             )
        //         ) {
        //             array_push($arr, [
        //                 'url' => url($route->uri),
        //                 'route_name' => $route->getName(),
        //             ]);
        //         }
        //     }
        // }

        // return ($arr);

        return view('pages.index');
    }

    /**
     * Show location on company profile
     *
     * @return void
     */
    public function location()
    {
        return view('pages.location');
    }

    /**
     * Show facilities on company profile
     *
     * @return void
     */
    public function facilities()
    {
        return view('pages.facilities');
    }

    /**
     * Show houses on company profile
     *
     * @return void
     */
    public function houses()
    {
        return view('pages.houses');
    }

    /**
     * Show homepage on company profile
     *
     * @return void
     */
    public function contact()
    {
        return view('pages.contact');
    }
}