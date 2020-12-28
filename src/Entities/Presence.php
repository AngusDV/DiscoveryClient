<?php

namespace AngusDV\DiscoveryClient\Entities;


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

    public function setTTL($value): self
    {
        Cache::put(static::TTL_KEY, $value);
        return $this;
    }

    public function build(): \AngusDV\DiscoveryClient\Contracts\PresenceResponse
    {
        return \AngusDV\DiscoveryClient\Facades\PresenceResponse::loadFromJson(Http::acceptJson()->post(config('client.SERVICE_DISCOVERY_ADDRESS'), [
            "name" => config('client.SERVICE_NAME'),
            "host" => config('client.SERVICE_HOST'),
            "port" => config('client.SERVICE_PORT')
        ])->body());
    }

    public function presence(): self
    {
        $this->isAlive() ?:
            $this->forcePresence();
        return $this;
    }

    public function forcePresence(): self
    {
        return $this->setTTL(
            $this->build()
                ->getTTL()
        )->setAlive();
    }

    public function isAlive(): bool
    {
        return Cache::get(static::ALIVE_KEY, false);
    }

    public function setAlive(): self
    {
        Cache::put(static::ALIVE_KEY, true, $this->getTTL());
        return $this;
    }
}
