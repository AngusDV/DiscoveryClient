<?php


namespace AngusDV\DiscoveryClient\Facades;


use Illuminate\Support\Facades\Facade;

/**
 * @method static \AngusDV\DiscoveryClient\Contracts\Registrar register()
 * @method static \AngusDV\DiscoveryClient\Contracts\Registrar forceRegister()
 * @method static \AngusDV\DiscoveryClient\Contracts\DiscoveryResponse discover()
 * @see  \AngusDV\DiscoveryClient\Entities\DiscoveryClient
 */

class DiscoveryClient extends Facade
{
    protected static function getFacadeAccessor()
    {
        return "client-discover";
    }
}