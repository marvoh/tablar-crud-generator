<?php

namespace Tablar\CrudGenerator;

use Tablar\CrudGenerator\Commands\CrudGenerator;
use Illuminate\Support\ServiceProvider;

/**
 * Class CrudServiceProvider.
 */
class CrudServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                CrudGenerator::class,
            ]);
        }

        $this->publishes([
            __DIR__ . '/../config/crud.php' => config_path('crud.php'),
        ], 'crud');
    }

    /**
     * Register services.
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/crud.php', 'crud'
        );
    }
}
