<?php

namespace AngusDV\DiscoveryClient\Providers;

use AngusDV\DiscoveryClient\Commands\DiscoverCommand;
use AngusDV\DiscoveryClient\Commands\PresenceCommand;
use AngusDV\DiscoveryClient\Contracts\ServiceDiscoverer;
use AngusDV\DiscoveryClient\Contracts\PresenceResponse;
use AngusDV\DiscoveryClient\Contracts\ServiceResponse;
use Illuminate\Support\ServiceProvider;

class DiscoveryClientServiceProvider extends ServiceProvider
{

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config.php' => config_path('client.php'),
        ], 'client');

        if ($this->app->runningInConsole()) {
            $this->commands([
                DiscoverCommand::class,
                PresenceCommand::class
            ]);
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PresenceResponse::class, function () {
            $className = config('client.response_model');
            $class = new $className();
            throw_unless($class instanceof PresenceResponse, new \Exception("given presence response is incompatible with contract"));
            return $class;
        });

        $this->app->bind(ServiceDiscoverer::class, function () {
            $className = config('client.discoverer_model');
            $class = new $className();
            throw_unless($class instanceof ServiceDiscoverer, new \Exception("given service discoverer is incompatible with contract"));
            return $class;
        });

        $this->app->bind(ServiceResponse::class, function () {
            $className = config('client.service_response_model');
            $class = new $className();
            throw_unless($class instanceof ServiceResponse, new \Exception("given service response is incompatible with contract"));
            return $class;
        });
    }


}
