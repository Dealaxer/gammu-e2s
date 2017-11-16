<?php

namespace Dealaxer\GammuE2S;

use Illuminate\Support\ServiceProvider;

class GammuE2SProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/web.php');
		$this->loadViewsFrom(__DIR__.'/views', 'gammu-e2s');
		$this->loadTranslationsFrom(__DIR__.'/lang', 'lang-e2s');
		
		$this->publishes([
			__DIR__.'/views/auth' => resource_path('views/auth'),
		]);
		$this->publishes([
			__DIR__.'/../public' => public_path(),
		]);
		$this->publishes([__DIR__.'/database' => base_path("database")], 'database');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
