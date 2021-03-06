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
    
    use App\Repositories\Contracts\AutoRepository;
    use App\Repositories\Eloquent\EloquentAuto;
    use App\Repositories\Contracts\DayPlanningRepository;
    use App\Repositories\Eloquent\EloquentDayPlanning;
    use App\Repositories\Contracts\PlanningRepository;
    use App\Repositories\Eloquent\EloquentPlanning;
    use App\Repositories\Eloquent\EloquentAlgemeneInfo;
    use App\Repositories\Contracts\AlgemeneInfoRepository;

    class RepositoryServiceProvider extends ServiceProvider
    {
        public function register()
        {
            $this->app->singleton(InfoRepositoryBackend::class, EloquentInfoBackend::class);
            $this->app->singleton(AutoRepositoryBackend::class, EloquentAutoBackend::class);
            $this->app->singleton(HotelRepository::class, EloquentHotel::class);
            $this->app->singleton(DayPlanningRepository::class, EloquentDayPlanning::class);
            $this->app->singleton(AlgemeneInfoRepository::class, EloquentAlgemeneInfo::class);
            
            $this->app->singleton(VervoerRepositoryBackend::class, EloquentVervoerBackend::class);
            $this->app->singleton(AutoRepository::class, EloquentAuto::class);
            $this->app->singleton(PlanningRepository::class, EloquentPlanning::class);
        }
    }
