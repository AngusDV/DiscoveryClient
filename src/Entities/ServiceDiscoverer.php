<?php


namespace AngusDV\DiscoveryClient\Entities;

use AngusDV\DiscoveryClient\Contracts\ServiceDiscoverer as Discoverer;

use Illuminate\Support\Facades\Http;

class ServiceDiscoverer implements Discoverer
{
    public function discover():\AngusDV\DiscoveryClient\Contracts\ServiceResponse
    {
        return  (new ServiceResponse())->loadFromJson(Http::acceptJson()->get(config('client.SERVICE_DISCOVERY_ADDRESS'))->body());
    }
}
