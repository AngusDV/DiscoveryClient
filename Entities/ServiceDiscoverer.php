<?php


namespace DiscoveryClient\Entities;

use DiscoveryClient\Contracts\ServiceDiscoverer as Discoverer;
use Illuminate\Support\Facades\Http;

class ServiceDiscoverer implements Discoverer
{
    public function discover():ServiceResponse
    {
        return  ServiceResponse::loadFromJson(Http::acceptJson()->get(config('DiscoveryClient.SERVICE_DISCOVERY_ADDRESS'))->body());
    }
}