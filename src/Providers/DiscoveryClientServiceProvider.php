<?php

namespace AngusDV\DiscoveryClient\Providers;

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
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PresenceResponse::class, function () {
            $a=config('client.response_model');
            $responseClass = new $a;
            throw_unless($responseClass instanceof PresenceResponse,new \Exception("given presence response is incompatible with contract"));
            return  $responseClass;
        });

        $this->app->bind(ServiceDiscoverer::class, function () {
            $a =  config('client.discoverer_model');
            $discovererClass = new $a;

            throw_unless($discovererClass instanceof ServiceDiscoverer,new \Exception("given service discoverer is incompatible with contract"));
            return $discovererClass;
        });

        $this->app->bind(ServiceResponse::class, function () {
            $a =  config('client.service_response_model');
            $discovererClass = new $a;

            throw_unless($discovererClass instanceof ServiceResponse,new \Exception("given service discoverer is incompatible with contract"));
            return $discovererClass;
        });
    }


}
