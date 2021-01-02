<?php

namespace AngusDV\DiscoveryClient;

use AngusDV\DiscoveryClient\Commands\ServicesCommand;
use AngusDV\DiscoveryClient\Commands\RegisterCommand;
use AngusDV\DiscoveryClient\Entities\Decorator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use AngusDV\DiscoveryClient\Contracts\DiscoveryClient;

class DiscoveryClientServiceProvider extends ServiceProvider
{

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        if (Str::contains($this->app->version(), 'Lumen')) {
            $this->app->configure('client');
        } else {
            $this->publishes([
                __DIR__ . '/config.php' => config_path('client.php'),
            ], 'client');
        }

        if ($this->app->runningInConsole()) {
            $this->commands([
                ServicesCommand::class,
                RegisterCommand::class
            ]);
        }
    }

    /**
     * Registrar the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config.php','client');
        $decorator = $this->createDecorator();
        $this->app->instance(Decorator::class, $decorator);
        $this->app->instance(DiscoveryClient::class, new \AngusDV\DiscoveryClient\Entities\DiscoveryClient($this->createDecorator()));
    }


    public function createDecorator(): Decorator
    {
        $decorator = new Decorator();

        $serviceDiscoverer = config('client.service_discoverer_model');
        $decorator->setServiceDiscoverer(new $serviceDiscoverer());

        $discoveryResponse = config('client.discovery_response_model');
        $decorator->setDiscoveryResponse(new $discoveryResponse());

        $registrarResponse = config('client.registrar_response_model');
        $decorator->setRegistrarResponse(new $registrarResponse());

        $registrar = config('client.registrar_model');
        $decorator->setRegistrar(new $registrar());

        $serviceRepository = config('client.service_repository_model');
        $decorator->setServiceRepository(new $serviceRepository());

        return $decorator;
    }


}
