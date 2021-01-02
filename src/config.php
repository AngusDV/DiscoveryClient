<?php

return [
    'service_discovery_address' => env('SERVICE_DISCOVERY_ADDRESS', '127.0.0.1'),
    'service_name' => env('SERVICE_NAME', env('APP_NAME')),
    'service_host' => env('SERVICE_HOST', env('APP_URL')),
    'service_port' => env('SERVICE_PORT', '80'),
    'service_ttl' => env('SERVICE_TTL', 300),
    'registrar_response_model' => \AngusDV\DiscoveryClient\Entities\RegistrarResponse::class,
    'registrar_model' => \AngusDV\DiscoveryClient\Entities\Registrar::class,
    'service_discoverer_model' => \AngusDV\DiscoveryClient\Entities\ServiceDiscoverer::class,
    'discovery_response_model' => \AngusDV\DiscoveryClient\Entities\DiscoveryResponse::class,
    'service_repository_model' => \AngusDV\DiscoveryClient\Entities\ServiceRepository::class,
];
