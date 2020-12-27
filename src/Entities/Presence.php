<?php

namespace AngusDV\DiscoveryClient\Entities;


use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use AngusDV\DiscoveryClient\Contracts\PresenceResponse;

class Presence
{

    const TTL_KEY = "TTL";
    const ALIVE_KEY = "ALIVE";

    public function getTTL()
    {
        return Cache::get(TTL_KEY, config('SERVICE_TTL'));
    }

    public function setTTL($value)
    {
        Cache::put(static::TTL_KEY, $value);
        return $value;
    }

    public function build():PresenceResponse
    {
        return  PresencePresenceResponse::loadFromJson(Http::acceptJson()->post(config('DiscoveryClient.SERVICE_DISCOVERY_ADDRESS'), [
            "name" => config('SERVICE_NAME'),
            "host" => config('DiscoveryClient.SERVICE_DISCOVERY_ADDRESS'),
            "port" => config('DiscoveryClient.SERVICE_PORT')
        ])->body());
    }

    public function presence()
    {
        if ($this->isAlive())
            return ;
        $ttl = $this->build()->getTTL();
        $this->setTTL($ttl);
        $this->setAlive();
    }

    public function forcePresence()
    {
        $ttl = $this->build()->getTTL();
        $this->setTTL($ttl);
        $this->setAlive();
    }

    public function isAlive()
    {
        return Cache::get(static::ALIVE_KEY, false);
    }

    public function setAlive()
    {
        Cache::put(static::ALIVE_KEY, true,$this->getTTL());
    }
}
