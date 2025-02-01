<?php

namespace CoderManjeet\LaravelFormBuilder;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class FormBuilderServiceProvider extends ServiceProvider {
    public function boot() {
        $this->mapApiRoutes();
        // $this->loadRoutesFrom(__DIR__. '/routes/web.php', 'laravel-form-builder');
        $this->loadMigrationsFrom(__DIR__. '/database/migrations', 'laravel-form-builder');
    }

    public function register() {
        // $this->mergeConfigFrom(__DIR__.'/config/form-builder.php', 'laravel-form-builder');
    }

    protected function mapApiRoutes() {
        Route::prefix('api')
             ->middleware('api')
             ->namespace('CoderManjeet\LaravelFormBuilder\Http\Controllers')
             ->group(__DIR__.'/routes/api.php');
    }
}