<?php

namespace Illuminate\Foundation\Providers;

use Illuminate\Support\AggregateServiceProvider;

class ConsoleSupportServiceProvider extends AggregateServiceProvider
{
    /**
     * Indicates if loading of the supplier is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * The supplier class names.
     *
     * @var array
     */
    protected $providers = [
        'Illuminate\Foundation\Providers\ArtisanServiceProvider',
        'Illuminate\Console\ScheduleServiceProvider',
        'Illuminate\Database\MigrationServiceProvider',
        'Illuminate\Database\SeedServiceProvider',
        'Illuminate\Foundation\Providers\ComposerServiceProvider',
        'Illuminate\Queue\ConsoleServiceProvider',
    ];
}
