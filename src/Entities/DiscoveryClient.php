<?php


namespace AngusDV\DiscoveryClient\Entities;


use AngusDV\DiscoveryClient\Contracts\ServiceDiscoverer;

class DiscoveryClient
{
    public Decorator $decorator;

    public function register():\AngusDV\DiscoveryClient\Contracts\Registrar
    {
        return $this->decorator->getRegistrar()->register();
    }

    public function forceRegister():\AngusDV\DiscoveryClient\Contracts\Registrar
    {
        $this->decorator->getRegistrar()->forceRegister();
    }

    public function discover():\AngusDV\DiscoveryClient\Contracts\DiscoveryResponse
    {
        $this->decorator->getServiceDiscoverer()->discover();
    }

}