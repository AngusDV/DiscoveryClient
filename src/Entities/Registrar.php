<?php

namespace AngusDV\DiscoveryClient\Entities;


use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class Registrar implements \AngusDV\DiscoveryClient\Contracts\Registrar
{

    const TTL_KEY = "TTL";
    const ALIVE_KEY = "ALIVE";

    public function getTTL()
    {
        return Cache::get(static::TTL_KEY, config('client.service_ttl'));
    }

    public function setTTL($value): self
    {
        Cache::put(static::TTL_KEY, $value);
        return $this;
    }

    public function build(Service $service): \AngusDV\DiscoveryClient\Contracts\RegistrarResponse
    {
        return app(Decorator::class)->getRegistrarResponse()->loadFromJson(Http::acceptJson()
            ->post(config('client.service_discovery_address'), [
                "name" => $service->getName(),
                "host" => $service->getHost(),
                "port" => $service->getPort()
            ])->body());
    }

    public function register(): self
    {
        $this->registered() ?:
            $this->forceRegister();
        return $this;
    }

    public function forceRegister(): self
    {
        return $this->setTTL(
            $this->build(new Service(
                    config('client.service_name'),
                    config('client.service_host'),
                    config('client.service_port')
                )
            )->getTTL()
        )->setRegistration();
    }

    public function registered(): bool
    {
        return Cache::get(static::ALIVE_KEY, false);
    }

    public function setRegistration(): self
    {
        Cache::put(static::ALIVE_KEY, true, $this->getTTL());
        return $this;
    }

}
