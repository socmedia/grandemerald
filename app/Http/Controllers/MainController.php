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
        return view('pages.index');
    }

    /**
     * Show strength on company profile
     *
     * @return void
     */
    public function strength()
    {
        return view('pages.strength');
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
     * Show contact on company profile
     *
     * @return void
     */
    public function contact()
    {
        return view('pages.contact');
    }

    /**
     * Show gallery on company profile
     *
     * @return void
     */
    public function gallery()
    {
        return view('pages.gallery');
    }
}