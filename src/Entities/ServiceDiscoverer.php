<?php


namespace AngusDV\DiscoveryClient\Entities;

use AngusDV\DiscoveryClient\Contracts\ServiceDiscoverer as Discoverer;

use Illuminate\Support\Facades\Http;

class ServiceDiscoverer implements Discoverer
{
    public function discover(): \AngusDV\DiscoveryClient\Contracts\DiscoveryResponse
    {
        return app()->make(\AngusDV\DiscoveryClient\Entities\Decorator::class)->getDiscoveryResponse()
            ->loadFromJson(Http::acceptJson()
                    ->get(config('client.service_discovery_address'))
                    ->body()
            );
    }
}
