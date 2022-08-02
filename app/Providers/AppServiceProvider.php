<?php

namespace App\Providers;

use App\Models\Company;
use App\Models\employee;
use View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         Paginator::useBootstrapFive();

         $default_lang=get_default_lang();
         $employees=employee::where('translation_lang',$default_lang)->Selection()->paginate(5);
         $companies=Company::pluck('id','name'); 
         View::share('employees',$employees);
         View::share('companies',$companies);
    }
}
