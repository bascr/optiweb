<?php

namespace Illuminate\Database;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Console\Seeds\SeedCommand;

class SeedServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the supplier is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service supplier.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('seeder', function () {
            return new Seeder;
        });

        $this->registerSeedCommand();

        $this->commands('command.seed');
    }

    /**
     * Register the seed console command.
     *
     * @return void
     */
    protected function registerSeedCommand()
    {
        $this->app->singleton('command.seed', function ($app) {
            return new SeedCommand($app['db']);
        });
    }

    /**
     * Get the services provided by the supplier.
     *
     * @return array
     */
    public function provides()
    {
        return ['seeder', 'command.seed'];
    }
}
