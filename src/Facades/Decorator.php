<?php


namespace AngusDV\DiscoveryClient\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \AngusDV\DiscoveryClient\Contracts\DiscoveryResponse getDiscovererResponse()
 * @method static \AngusDV\DiscoveryClient\Contracts\ServiceDiscoverer getServiceDiscoverer()
 * @method static \AngusDV\DiscoveryClient\Contracts\RegistrarResponse getRegistrarResponse()
 * @method static \AngusDV\DiscoveryClient\Contracts\Registrar getRegistrar()
 * @see  \AngusDV\DiscoveryClient\Entities\Decorator
 */

class Decorator extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \AngusDV\DiscoveryClient\Entities\Decorator::class;
    }
}