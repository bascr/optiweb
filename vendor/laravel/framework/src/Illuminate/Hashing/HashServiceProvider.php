<?php

namespace Illuminate\Hashing;

use Illuminate\Support\ServiceProvider;

class HashServiceProvider extends ServiceProvider
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
        $this->app->singleton('hash', function () {
            return new BcryptHasher;
        });
    }

    /**
     * Get the services provided by the supplier.
     *
     * @return array
     */
    public function provides()
    {
        return ['hash'];
    }
}
