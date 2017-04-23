<?php

namespace Illuminate\Auth\Passwords;

use Illuminate\Support\ServiceProvider;

class PasswordResetServiceProvider extends ServiceProvider
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
        $this->registerPasswordBroker();
    }

    /**
     * Register the password broker instance.
     *
     * @return void
     */
    protected function registerPasswordBroker()
    {
        $this->app->singleton('auth.password', function ($app) {
            return new PasswordBrokerManager($app);
        });

        $this->app->bind('auth.password.broker', function ($app) {
            return $app->make('auth.password')->broker();
        });
    }

    /**
     * Get the services provided by the supplier.
     *
     * @return array
     */
    public function provides()
    {
        return ['auth.password', 'auth.password.broker'];
    }
}
