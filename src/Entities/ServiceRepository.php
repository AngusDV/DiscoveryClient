<?php


namespace AngusDV\DiscoveryClient\Entities;


use AngusDV\DiscoveryClient\Exceptions\ServiceNotAvailable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;


class ServiceRepository
{
    const SERVICE_KEY = "SERVICE_CACHE_KEY";

    public function setServices($value): self
    {
        Cache::put(static::SERVICE_KEY, $value, app(Decorator::class)->getRegistrar()->getTTL());
        return $this;
    }

    public function getServices(): Collection
    {
        return Cache::get(static::SERVICE_KEY, function () {
            $this->setServices(app(Decorator::class)->getServiceDiscoverer()->discover()->getServices());
            return $this->getServices();
        });
    }

    public function forgetServices(): self
    {
        Cache::forget(static::SERVICE_KEY);
        return $this;
    }

    public function forceGetServices(): Collection
    {
        return $this->forgetServices()->getServices();
    }


    public function findOrFail($name): Service
    {
        $service = $this->getServices()->where('name', $name)->first() ?: $this->forceGetServices()->where('name', $name)->first();
        throw_if(is_null($service), ServiceNotAvailable::class);
        return $service;
    }

}
