<?php

namespace Digitalroom\AnalyticsServer;

use Digitalroom\AnalyticsServer\Commands\InstallAnalyticsServer;

class AnalyticsServerServiceProvider extends Command
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