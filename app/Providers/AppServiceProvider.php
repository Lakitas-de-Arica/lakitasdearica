<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use App\Contracts\New\NewInterface;
use App\Services\New\NewService;
use App\Contracts\Comparsa\ComparsaInterface;
use App\Services\Comparsa\ComparsaService;
use App\Contracts\Multimedia\MultimediaInterface;
use App\Services\Multimedia\MultimediaService;
use Illuminate\Support\Facades\Validator;

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
        $this->app->bind(MultimediaInterface::class, MultimediaService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Carbon::setlocale('es_ES');

        Validator::extend('youtube', function ($attribute, $value, $parameters, $validator) {
            $validator->addReplacer('youtube', function ($message, $attribute, $rule, $parameters) {
                return 'El link no pertenece a un video de Youtube';
            });

            return (bool) preg_match('/^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=|\?v=)([^#\&\?]*).*/',$value);
        });
    }
}
