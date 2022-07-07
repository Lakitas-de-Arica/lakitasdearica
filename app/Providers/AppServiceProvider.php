<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use App\Contracts\New\NewInterface;
use App\Services\New\NewService;
use App\Contracts\Comparsa\ComparsaInterface;
use App\Services\Comparsa\ComparsaService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(NewInterface::class, NewService::class);
        $this->app->bind(ComparsaInterface::class, ComparsaService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Carbon::setlocale('es_ES');
    }
}
