<?php

namespace Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

class InstallAnalyticsServer extends Command
{
    protected $signature = 'analytics-server:install';

    public function handle()
    {
        // Crear el controlador
        Artisan::call('make:controller', ['name' => 'EventController']);

        // Crear la migración
        Artisan::call('make:migration', ['name' => 'create_event_table', '--create' => 'events']);

        // Copiar la plantilla del controlador a la ubicación correcta
        File::copy(__DIR__.'/../stubs/EventController.stub', app_path('Http/Controllers/EventController.php'));

        // Copiar la plantilla de la migración a la ubicación correcta
        $fileName = date('Y_m_d_His').'_create_event_table.php';
        File::copy(__DIR__.'/../stubs/create_event_table.stub', database_path("migrations/{$fileName}"));

        // Agregar la ruta al archivo routes/web.php
        File::append(base_path('routes/web.php'), "Route::prefix('/event')->group(function () { Route::post('/create',[App\Http\Controllers\EventController::class,'createEvent']); });\n");
    }
}