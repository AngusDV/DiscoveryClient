<?php


namespace AngusDV\DiscoveryClient\Contracts;


use AngusDV\DiscoveryClient\Entities\ServiceResponse;

interface ServiceDiscoverer
{
    public function discover(): ServiceResponse;
}