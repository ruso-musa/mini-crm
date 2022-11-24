<?php

namespace App\Providers;

use App\Repo\Company\CompanyRepo;
use App\Repo\Company\ICompanyRepo;

use Illuminate\Pagination\Paginator;
use App\Repo\Employees\EmployeesRepo;

use Illuminate\Support\Facades\Blade;
use App\Repo\Employees\IEmployeesRepo;
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
        $this->app->bind(IEmployeesRepo::class, EmployeesRepo::class);
        $this->app->bind(ICompanyRepo::class, CompanyRepo::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

           // custome direction
           Blade::if('admin', function () {
            return auth()->check() && auth()->user()->role == 'admin';
          
        });
    }
}
