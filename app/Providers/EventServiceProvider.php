<?php

namespace App\Providers;

use App\Events\UserLoggedOutEvent;
use App\Events\UserLogInEvent;
use App\Listeners\UserLoggedInListener;
use App\Listeners\UserLoggedOutlistener;
use App\Models\Employee;
use App\Models\User;
use App\Observers\EmployeeObserver;
use App\Observers\UserObserver;
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
        UserLogInEvent::class => [
            UserLoggedInListener::class
        ],
        UserLoggedOutEvent::class => [
            UserLoggedOutlistener::class
        ]
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        User::observe(UserObserver::class);
        Employee::observe(EmployeeObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
