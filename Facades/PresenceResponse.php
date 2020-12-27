<?php
namespace DiscoveryClient\Facades;


class PresenceResponse extends  \Illuminate\Support\Facades\Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \DiscoveryClient\Contracts\PresenceResponse::class;
    }
}