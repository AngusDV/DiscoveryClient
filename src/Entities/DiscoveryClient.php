<?php


namespace AngusDV\DiscoveryClient\Entities;



use Illuminate\Support\Collection;

class DiscoveryClient implements \AngusDV\DiscoveryClient\Contracts\DiscoveryClient
{
    public Decorator $decorator;

    public function __construct(Decorator $decorator)
    {
        $this->setDecorator($decorator);
    }

    public function setDecorator(Decorator $decorator)
    {
        $this->decorator = $decorator;
    }

    public function getDecorator(): Decorator
    {
        return $this->decorator;
    }

    public function register(): \AngusDV\DiscoveryClient\Contracts\Registrar
    {
        return $this->getDecorator()->getRegistrar()->register();
    }

    public function forceRegister(): \AngusDV\DiscoveryClient\Contracts\Registrar
    {
        return $this->getDecorator()->getRegistrar()->forceRegister();
    }

    public function getServices(): Collection
    {
        return $this->getDecorator()->getServiceRepository()->getServices();
    }

    public function findOrFail($name): Service
    {
        return $this->getDecorator()->getServiceRepository()->findOrFail($name);
    }

}
