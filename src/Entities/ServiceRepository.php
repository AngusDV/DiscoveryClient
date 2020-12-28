<?php


namespace AngusDV\DiscoveryClient\Entities;


use Illuminate\Support\Facades\Cache;


class ServiceRepository
{


    public function setServices($value)
    {
        Cache::put($this->getServicesCacheKey(), $value, (new Presence())->getTTL());
        return $this;
    }

    public function getServices()
    {
        return Cache::get($this->getServicesCacheKey(), function () {
            $this->setServices(\AngusDV\DiscoveryClient\Facades\ServiceDiscoverer::discover()->getServices());
            return $this->getServices();
        });
    }

    public function forgetServices()
    {
        Cache::forget($this->getServicesCacheKey());
        return $this;
    }

    public function forceGetServices()
    {
        return $this->forgetServices()->getServices();
    }

    protected function getServicesCacheKey()
    {
        return "SERVICE_CACHE_KEY";
    }

    public function findOrFail($name)
    {
        $service= $this->getServices()->where('name',$name)->first() ?: $this->forceGetServices()->where('name',$name)->first();
        throw_if(is_null($service), new \Exception("service is not available"));
        return $service;
    }

}