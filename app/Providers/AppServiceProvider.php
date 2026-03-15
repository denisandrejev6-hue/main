<?php

namespace App\Providers;

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
        // set the application locale based on config (env)
        app()->setLocale(config('app.locale'));

        // ensure Carbon uses the same locale for dates
        if (class_exists(\Carbon\Carbon::class)) {
            \Carbon\Carbon::setLocale(config('app.locale'));
        }

        // custom validator: check that end time is not before start time
        \Illuminate\Support\Facades\Validator::extend('time_after_or_equal', function ($attribute, $value, $parameters, $validator) {
            $other = $validator->getData()[$parameters[0]] ?? null;
            
            if (! $other || ! $value) {
                return true;
            }

            // compare times in H:i format
            return strtotime($value) >= strtotime($other);
        });

        // custom validator: check that start time is not after end time
        \Illuminate\Support\Facades\Validator::extend('time_before_or_equal', function ($attribute, $value, $parameters, $validator) {
            $other = $validator->getData()[$parameters[0]] ?? null;
            
            if (! $other || ! $value) {
                return true;
            }

            // compare times in H:i format
            return strtotime($value) <= strtotime($other);
        });
    }
}
