<?php

return [
    'SERVICE_DISCOVERY_ADDRESS'=> env('SERVICE_DISCOVERY_ADDRESS'),
    'SERVICE_NAME'=> env('SERVICE_NAME'),
    'SERVICE_HOST'=> env('SERVICE_HOST'),
    'SERVICE_PORT'=> env('SERVICE_PORT'),
    'SERVICE_TTL'=> env('SERVICE_TTL'),
    'SERVICE_CACHE_KEY'=> env('SERVICE_CACHE_KEY'),
    'response_model'=> \AngusDV\DiscoveryClient\Entities\PresenceResponse::class,
    'discoverer_model'=> \AngusDV\DiscoveryClient\Entities\ServiceDiscoverer::class,
    'service_response_model'=> \AngusDV\DiscoveryClient\Entities\ServiceResponse::class,
];
