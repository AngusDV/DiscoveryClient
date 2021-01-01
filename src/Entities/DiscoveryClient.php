<?php


namespace AngusDV\DiscoveryClient\Entities;


use AngusDV\DiscoveryClient\Contracts\DiscoveryClient;
use AngusDV\DiscoveryClient\Contracts\ServiceDiscoverer;

class DiscoveryClient implements DiscoveryClient
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

    public function discover(): \AngusDV\DiscoveryClient\Contracts\DiscoveryResponse
    {
        return $this->getDecorator()->getServiceDiscoverer()->discover();
    }

}