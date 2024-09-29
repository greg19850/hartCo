<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        $defaultInfo = [
            'address' => '27 AUGUSTA PLACE',
            'postcode' => 'CV32 5EL',
            'city' => 'Lemington Spa',
            'phone' => 'N/A',
            'email' => 'reservations@hartrestaurants.co.uk',
            'facebook' => 'https://www.facebook.com/hartrestaurants1/',
            'instagram' => 'https://www.instagram.com/hartleamington/',
        ];

        View::share('ruleDeleteText', 'If you confirm deleting this rule, all it\'s  data will be lost. Are you sure you want do remove this rule?');
        View::share('subMenuDeleteText', 'If you confirm deleting this sub menu, all it\'s  data, menu items belonging to it, will be lost. Are you sure you want to remove this sub menu?');
        View::share('menuItemsDeleteText', 'If you confirm clearing menu items list, all items will be lost. Are you sure you want to clear the list?');
        View::share('defaultContactInfo', $defaultInfo);
    }
}
