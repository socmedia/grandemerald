<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Modules\Contact\Entities\ContactsAttribute;

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

        $contact = ContactsAttribute::orderBy('id')->get()->toArray();

        $instagram = count($contact) > 0 ? $contact[0] : null;
        $facebook = count($contact) > 1 ? $contact[1] : null;
        $email = count($contact) > 2 ? $contact[2] : null;
        $whatsapp = count($contact) > 3 ? $contact[3] : null;
        $catalogue = count($contact) > 4 ? $contact[4] : null;
        $whatsapp2 = count($contact) > 5 ? $contact[5] : null;
        $phone = count($contact) > 6 ? $contact[6] : null;

        view()->share('instagram', $instagram ? $instagram['value'] : null);
        view()->share('facebook', $facebook ? $facebook['value'] : null);
        view()->share('email', $email ? $email['value'] : null);
        view()->share('whatsapp', $whatsapp ? $whatsapp['value'] : null);
        view()->share('catalogue', $catalogue ? $catalogue['value'] : null);
        view()->share('whatsapp2', $whatsapp2 ? $whatsapp2['value'] : null);
        view()->share('phone', $phone ? $phone['value'] : null);
    }
}
