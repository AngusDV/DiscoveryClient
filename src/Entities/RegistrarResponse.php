<?php


namespace AngusDV\DiscoveryClient\Entities;


use AngusDV\DiscoveryClient\Exceptions\InvalidRegistrationResponse;

class RegistrarResponse implements \AngusDV\DiscoveryClient\Contracts\RegistrarResponse
{
    public $ttl;

    public function loadFromJson($data): self
    {
        $json = json_decode($data, true);
        throw_unless(isset($json['data']), InvalidRegistrationResponse::class);
        $this->ttl = $json['data'];
        return $this;
    }

    public function getTTL()
    {
        return $this->ttl;
    }
}
