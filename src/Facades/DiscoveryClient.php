<?php


namespace AngusDV\DiscoveryClient\Facades;


use AngusDV\DiscoveryClient\Entities\Decorator;
use Illuminate\Support\Facades\Facade;

/**
 * @method static \AngusDV\DiscoveryClient\Entities\Decorator getDecorator()
 * @method static void setDecorator(Decorator $decorator)
 * @method static \AngusDV\DiscoveryClient\Contracts\Registrar register()
 * @method static \AngusDV\DiscoveryClient\Contracts\Registrar forceRegister()
 * @method static \Illuminate\Support\Collection getServices()
 * @method static \AngusDV\DiscoveryClient\Entities\Service findOrFail($name)
 * @see  AngusDV\DiscoveryClient\Contracts\DiscoveryClient
 */

class DiscoveryClient extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \AngusDV\DiscoveryClient\Contracts\DiscoveryClient::class;
    }
}
