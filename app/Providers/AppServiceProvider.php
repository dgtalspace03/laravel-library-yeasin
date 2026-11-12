<?php

namespace App\Providers;

use App\Models\books;
use App\Models\Borrow;
use App\Models\User;
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
        View::composer('layouts.admin',function ($veiw){
            $total_copies=books::sum('total_copies');
            $total_avilable=books::sum('available_copies');
            $currently_borrowed=$total_copies-$total_avilable;
            $total_borrowed=count(Borrow::all());
            $total_user=count(User::all());
           $veiw->with('total_copies',$total_copies);
           $veiw->with('currently_borrowed',$currently_borrowed);
           $veiw->with('total_borrowed',$total_borrowed);
           $veiw->with('total_user',$total_user);
        });
    }
}
