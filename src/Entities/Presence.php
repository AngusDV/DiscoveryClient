<?php

namespace AngusDV\DiscoveryClient\Entities;


use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class Presence
{

    const TTL_KEY = "TTL";
    const ALIVE_KEY = "ALIVE";

    public function getTTL()
    {
        return Cache::get(static::TTL_KEY, config('client.SERVICE_TTL'));
    }

    public function setTTL($value)
    {
        Cache::put(static::TTL_KEY, $value);
        return $value;
    }

    public function build():\AngusDV\DiscoveryClient\Contracts\PresenceResponse
    {
        return  \AngusDV\DiscoveryClient\Facades\PresenceResponse::loadFromJson(Http::acceptJson()->post(config('client.SERVICE_DISCOVERY_ADDRESS'), [
            "name" => config('client.SERVICE_NAME'),
            "host" => config('client.SERVICE_DISCOVERY_ADDRESS'),
            "port" => config('client.SERVICE_PORT')
        ])->body());
    }

    public function presence()
    {
        if ($this->isAlive())
            return $this->getTTL();
        $ttl = $this->build()->getTTL();
        $this->setTTL($ttl);
        $this->setAlive();
        return $this->getTTL();
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
