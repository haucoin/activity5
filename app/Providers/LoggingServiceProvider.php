<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class LoggingServiceProvider extends ServiceProvider {
	
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    	$this->app->singleton('App\Services\Utility\ILoggerService', function ($app) {
    		return new \App\Services\Utility\MyLoggerInjection();
    	});
    }
    
    
    public function provides() {
    	echo "Deffered true and i am here in provides()";
    	return ['App\Services\Utility\ILoggerService'];
    }
    

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
