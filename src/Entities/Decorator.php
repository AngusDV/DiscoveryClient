<?php


namespace AngusDV\DiscoveryClient\Entities;


use AngusDV\DiscoveryClient\Contracts\ServiceDiscoverer;

class Decorator
{

    protected ServiceDiscoverer $serviceDiscoverer;
    protected DiscoveryResponse $discoveryResponse;
    protected RegistrarResponse $registrarResponse;
    protected Registrar $registrar;

    public function setServiceDiscoverer(ServiceDiscoverer $serviceDiscoverer)
    {
        $this->serviceDiscoverer = $serviceDiscoverer;
    }

    public function getServiceDiscoverer(): ServiceDiscoverer
    {
        return $this->serviceDiscoverer;
    }

    public function setDiscoveryResponse(DiscoveryResponse $discoveryResponse)
    {
        $this->discoveryResponse = $discoveryResponse;
    }

    public function getDiscoveryResponse(): DiscoveryResponse
    {
        return $this->discoveryResponse;
    }

    public function setRegistrarResponse(RegistrarResponse $registrarResponse)
    {
        $this->registrarResponse = $registrarResponse;
    }

    public function getRegistrarResponse(): RegistrarResponse
    {
        return $this->registrarResponse;
    }

    public function setRegistrar(Registrar $registrar)
    {
        $this->registrar = $registrar;
    }

    public function getRegistrar(): Registrar
    {
        return $this->registrar;
    }

}