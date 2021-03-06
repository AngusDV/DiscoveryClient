<?php


namespace AngusDV\DiscoveryClient\Contracts;


use AngusDV\DiscoveryClient\Entities\Decorator;
use AngusDV\DiscoveryClient\Entities\Service;
use Illuminate\Support\Collection;

interface DiscoveryClient
{

    public function getDecorator():Decorator;

    public function setDecorator(Decorator $decorator);

    public function register(): \AngusDV\DiscoveryClient\Contracts\Registrar;

    public function forceRegister(): \AngusDV\DiscoveryClient\Contracts\Registrar;

    public function getServices(): Collection;

    public function findOrFail($name):Service;
}
