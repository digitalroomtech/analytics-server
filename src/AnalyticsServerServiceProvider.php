<?php

namespace Digitalroom\AnalyticsServer;

use Digitalroom\AnalyticsServer\Commands\InstallAnalyticsServer;
use Illuminate\Support\ServiceProvider;

class AnalyticsServerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallAnalyticsServer::class,
            ]);
        }
    }

    
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}