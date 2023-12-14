<?php

namespace App\Providers;
use App\Providers\Validator;
use Illuminate\Validation\Validator as BaseValidator;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Validator::extend('date_format', function ($attribute, $value, $formats) {
        //     // バリデーションのロジックを記述する
        //     foreach ($formats as $format) {
        //         $parsed = \DateTime::createFromFormat($format, $value);
        //         if ($parsed && $parsed->format($format) === $value) {
        //             return true;
        //         }
        //     }

        //     return false;
        // });
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('admin', function($user){
            return ($user->role == "1" || $user->role == "2" || $user->role == "3");
        });
    }
}
