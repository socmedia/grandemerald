<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        // $contact = ContactsAttribute::orderBy('id')->get()->toArray();

        $contact = [];
        $instagram = count($contact) > 0 ? $contact[0] : null;
        $facebook = count($contact) > 1 ? $contact[1] : null;
        $email = count($contact) > 2 ? $contact[2] : null;
        $whatsapp = count($contact) > 3 ? $contact[3] : null;
        $catalogue = count($contact) > 4 ? $contact[4] : null;

        view()->share('instagram', $instagram ? $instagram['value'] : null);
        view()->share('facebook', $facebook ? $facebook['value'] : null);
        view()->share('email', $email ? $email['value'] : null);
        view()->share('whatsapp', $whatsapp ? $whatsapp['value'] : null);
        view()->share('catalogue', $catalogue ? $catalogue['value'] : null);
    }
}