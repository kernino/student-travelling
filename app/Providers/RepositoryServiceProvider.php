<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    namespace App\Providers;
    use Illuminate\Support\ServiceProvider;
    use App\Repositories\Contracts\AutoRepositoryBackend;
    use App\Repositories\Eloquent\EloquentAutoBackend;
    use App\Repositories\Contracts\HotelRepository;
    use App\Repositories\Eloquent\EloquentHotel;

    class RepositoryServiceProvider extends ServiceProvider
    {
        public function register()
        {
            $this->app->singleton(AutoRepositoryBackend::class, EloquentAutoBackend::class);
            $this->app->singleton(HotelRepository::class, EloquentHotel::class);
        }
    }