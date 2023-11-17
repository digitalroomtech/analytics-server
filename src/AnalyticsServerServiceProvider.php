<?php

namespace Digitalroom\AnalyticsServer;

use Illuminate\Support\ServiceProvider;
use Digitalroom\AnalyticsServer\Commands\InstallAnalyticsServer;

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
}