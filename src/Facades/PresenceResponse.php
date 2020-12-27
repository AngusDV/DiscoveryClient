<?php
namespace AngusDV\DiscoveryClient\Facades;


class PresenceResponse extends  \Illuminate\Support\Facades\Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \AngusDV\DiscoveryClient\Contracts\PresenceResponse::class;
    }
}