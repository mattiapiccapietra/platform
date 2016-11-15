<?php

namespace Orchid\Foundation\Providers;

use Illuminate\Support\ServiceProvider;

class ConsoleServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Parent command namespace.
     *
     * @var string
     */
    protected $namespace = 'Orchid\\Foundation\\Console\\';

    /**
     * The available command shortname.
     *
     * @var array
     */
    protected $commands = [
        'Commands\\CreateAdminCommand',
    ];

    /**
     * Register the commands.
     */
    public function register()
    {
        foreach ($this->commands as $command) {
            $this->commands($this->namespace.$command);
        }
    }

    /**
     * @return array
     */
    public function provides()
    {
        $provides = [];
        foreach ($this->commands as $command) {
            $provides[] = $this->namespace.$command;
        }

        return $provides;
    }
}
