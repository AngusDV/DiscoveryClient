<?php


namespace AngusDV\DiscoveryClient\Contracts;



interface ServiceDiscoverer
{
    public function discover(): \AngusDV\DiscoveryClient\Contracts\DiscoveryResponse;
}
