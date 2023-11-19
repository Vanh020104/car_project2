<?php

namespace App\Providers;

use App\Events\CreateConfirmCompleted;
use App\Events\CreateConfirmOrder;
use App\Events\CreateNewOrder;
use App\Events\CreateNewRemindReturnCar;
use App\Events\CreateOverdueRemind;
use App\Listeners\DispatchConfirmCompleted;
use App\Listeners\DispatchConfirmOrder;
use App\Listeners\DispatchNewOrder;
use App\Listeners\DispatchNewRemindReturnCar;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
//        CreateNewOrder::class => [
//            DispatchNewOrder::class,
//        ]
        CreateNewOrder::class => [
            DispatchNewOrder::class,
        ],
        CreateConfirmOrder::class =>[
            DispatchConfirmOrder::class
        ],
        CreateConfirmCompleted::class =>[
            DispatchConfirmCompleted::class
        ],
        CreateNewRemindReturnCar::class =>[
            DispatchNewRemindReturnCar::class
        ],
        CreateOverdueRemind::class =>[

        ]
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

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
