<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use App\Listeners\UpdateCartUserId;
use App\Listeners\UpdateUserLastLoginAt;
use App\Listeners\DeleteCartCookieId;
use App\Listeners\SendOrderCreatedEmailToAdmin;
use App\Listeners\SendOrderCreatedNotification;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        Login::class => [
            UpdateCartUserId::class,
            UpdateUserLastLoginAt::class,
        ],
        Logout::class => [
            DeleteCartCookieId::class
        ],
        'order.created' => [
            SendOrderCreatedEmailToAdmin::class,
        ],
        OrderCreated::class => [
            SendOrderCreatedNotification::class,
            // SendOrderCreatedEmailToAdmin::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
