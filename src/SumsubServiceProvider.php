<?php

namespace Ahmeddabak\Sumsub;

use Ahmeddabak\Sumsub\Views\Components\Websdk;
use Illuminate\Support\ServiceProvider;

class SumsubServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/sumsub.php', 'sumsub'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/sumsub.php' => config_path('sumsub.php'),
        ], 'config');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'sumsub');

        $this->loadViewComponentsAs('sumsub', [
            Websdk::class,
        ]);
    }
}
