<?php
namespace AngusDV\DiscoveryClient\Facades;

/**
 * @method static \AngusDV\DiscoveryClient\Contracts\ServiceResponse discover()
 * @see  \AngusDV\DiscoveryClient\Contracts\ServiceDiscoverer
 */

class ServiceDiscoverer extends  \Illuminate\Support\Facades\Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \AngusDV\DiscoveryClient\Contracts\ServiceDiscoverer::class;
    }
}