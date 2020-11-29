<?php

namespace Ahmeddabak\Sumsub;

use Ahmeddabak\Sumsub\Http\Controllers\WebhookController;
use Ahmeddabak\Sumsub\Views\Components\Websdk;
use Illuminate\Support\Facades\Route;
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
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/sumsub.php' => config_path('sumsub.php'),
            ], 'config');
        }

        Route::post('/webhooks/sumsub', WebhookController::class);

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'sumsub');

        $this->loadViewComponentsAs('sumsub', [
            Websdk::class,
        ]);
    }
}
