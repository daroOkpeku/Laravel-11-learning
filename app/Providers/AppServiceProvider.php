<?php

namespace App\Providers;

use App\Events\Userevent;
use App\Listeners\Userlistener;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

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
      Event::listen(
       Userevent::class,
       Userlistener::class
      );

    //   you can add more here like this
    //  manually register events and listener
    // Event::listen(
    //     Userevent::class,
    //     Userlistener::class
    //    );


    }
}
