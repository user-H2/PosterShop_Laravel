<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\loai_sp;

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
        view()->composer('navbar', function($view){
            $loaisp = loai_sp::all();
            $view->with('loaisp',$loaisp);
        });
    }
}
