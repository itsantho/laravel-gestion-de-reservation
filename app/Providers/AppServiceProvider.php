<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Booking;
use App\Models\Property;

use Filament\Facades\Filament;
use Illuminate\Support\Facades\View;
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
        View::share('users',User::all());
        View::share('properties', Property::all());
        View::share('bookings',Booking::all());
        
    }
}
