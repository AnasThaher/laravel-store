<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cookie;
use App\Repositories\Cart\CartRepository;
use App\Repositories\Cart\DatabaseRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('cart.cookie_id', function($app) {
            $cookie_id = Cookie::get('cart_id');
            if (!$cookie_id) {
                $cookie_id = Str::uuid();
                Cookie::queue('cart_id', $cookie_id, 24 * 60 * 30);
            }
            return $cookie_id;
        });

        $this->app->bind(CartRepository::class, function($app) {
            return new DatabaseRepository($app->make('cart.cookie_id'));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
            // Paginator::useBootstrap();
            Paginator::defaultView('pagination.store');

            // App:setLocal('en');
    }
}
