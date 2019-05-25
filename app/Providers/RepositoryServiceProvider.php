<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    namespace App\Providers;
    use Illuminate\Support\ServiceProvider;
    use App\Repositories\Contracts\InfoRepositoryBackend;
    use App\Repositories\Eloquent\EloquentInfoBackend;
    use App\Repositories\Contracts\AutoRepositoryBackend;
    use App\Repositories\Eloquent\EloquentAutoBackend;
    use App\Repositories\Contracts\HotelRepository;
    use App\Repositories\Eloquent\EloquentHotel;
    
    use App\Repositories\Contracts\VervoerRepositoryBackend;
    use App\Repositories\Eloquent\EloquentVervoerBackend;

    class RepositoryServiceProvider extends ServiceProvider
    {
        public function register()
        {
            $this->app->singleton(InfoRepositoryBackend::class, EloquentInfoBackend::class);
            $this->app->singleton(AutoRepositoryBackend::class, EloquentAutoBackend::class);
            $this->app->singleton(HotelRepository::class, EloquentHotel::class);
            
            $this->app->singleton(VervoerRepositoryBackend::class, EloquentVervoerBackend::class);
        }
    }
