<?php

namespace DiscoveryClient\Providers;

use DiscoveryClient\Contracts\ServiceDiscoverer;
use DiscoveryClient\Contracts\PresenceResponse;
use DiscoveryClient\Contracts\ServiceResponse;
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
        ], 'client-config');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PresenceResponse::class, function () {
            $responseClass = new config('client-config.response_model');
            throw_unless($responseClass instanceof PresenceResponse,new \Exception("given presence response is incompatible with contract"));
            return  $responseClass;
        });

        $this->app->bind(ServiceDiscoverer::class, function () {
            $discovererClass = new config('client-config.discoverer_model');
            throw_unless($discovererClass instanceof ServiceResponse,new \Exception("given service discoverer is incompatible with contract"));
            return $discovererClass;
        });
    }


}
