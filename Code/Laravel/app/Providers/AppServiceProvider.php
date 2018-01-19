<?php

namespace App\Providers;

use View;
use Auth;
use App\Course;
use App\Discipline;
use App\Notifications\UserNotification;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);           // string => varchar(191)
        
        $global_disciplines = Discipline::lists('discipline', 'id');
        View::share('global_disciplines', $global_disciplines);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
