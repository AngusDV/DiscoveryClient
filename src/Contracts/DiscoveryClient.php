<?php


namespace AngusDV\DiscoveryClient\Contracts;


use AngusDV\DiscoveryClient\Entities\Decorator;

interface DiscoveryClient
{

    public function getDecorator():Decorator;

    public function setDecorator(Decorator $decorator);

    public function register(): \AngusDV\DiscoveryClient\Contracts\Registrar;

    public function forceRegister(): \AngusDV\DiscoveryClient\Contracts\Registrar;

    public function discover(): \AngusDV\DiscoveryClient\Contracts\DiscoveryResponse;
}