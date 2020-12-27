<?php


namespace DiscoveryClient\Contracts;


use DiscoveryClient\Entities\ServiceResponse;

interface ServiceDiscoverer
{
    public function discover(): ServiceResponse;
}