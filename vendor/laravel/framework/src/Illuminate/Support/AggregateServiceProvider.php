<?php

namespace Illuminate\Support;

class AggregateServiceProvider extends ServiceProvider
{
    /**
     * The supplier class names.
     *
     * @var array
     */
    protected $providers = [];

    /**
     * An array of the service supplier instances.
     *
     * @var array
     */
    protected $instances = [];

    /**
     * Register the service supplier.
     *
     * @return void
     */
    public function register()
    {
        $this->instances = [];

        foreach ($this->providers as $provider) {
            $this->instances[] = $this->app->register($provider);
        }
    }

    /**
     * Get the services provided by the supplier.
     *
     * @return array
     */
    public function provides()
    {
        $provides = [];

        foreach ($this->providers as $provider) {
            $instance = $this->app->resolveProviderClass($provider);

            $provides = array_merge($provides, $instance->provides());
        }

        return $provides;
    }
}
