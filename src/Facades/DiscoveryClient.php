<?php


namespace AngusDV\DiscoveryClient\Facades;


use AngusDV\DiscoveryClient\Contracts\DiscoveryClient;
use AngusDV\DiscoveryClient\Entities\Decorator;
use Illuminate\Support\Facades\Facade;

/**
 * @method static \AngusDV\DiscoveryClient\Entities\Decorator getDecorator()
 * @method static void setDecorator(Decorator $decorator)
 * @method static \AngusDV\DiscoveryClient\Contracts\Registrar register()
 * @method static \AngusDV\DiscoveryClient\Contracts\Registrar forceRegister()
 * @method static \AngusDV\DiscoveryClient\Contracts\DiscoveryResponse discover()
 * @see  \AngusDV\DiscoveryClient\Entities\DiscoveryClient
 */

class DiscoveryClient extends Facade
{
    protected static function getFacadeAccessor()
    {
        return DiscoveryClient::class;
    }
}