<?php
namespace AngusDV\DiscoveryClient\Facades;

/**
 * @method static \AngusDV\DiscoveryClient\Contracts\ServiceResponse loadFromJson()
 * @method static \Illuminate\Support\Collection getServices()
 * @see  \AngusDV\DiscoveryClient\Contracts\ServiceResponse
 */

class ServiceResponse extends  \Illuminate\Support\Facades\Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \AngusDV\DiscoveryClient\Contracts\ServiceResponse::class;
    }
}
