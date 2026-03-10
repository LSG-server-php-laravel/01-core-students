<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Pet;
use App\Observers\PetObserver;

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
        Pet::observe(PetObserver::class);
    }
}
