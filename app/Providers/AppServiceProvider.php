<?php

namespace App\Providers;

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
        view()->composer('daftar.menu', function($view){
            $view->with(['kategori'=> \App\Kategori::all(),'kecamatan'=> \App\Kecamatan::all(),'kelurahan'=> \App\Kelurahan::all()]);
        });
    }
}
