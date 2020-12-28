<?php


namespace AngusDV\DiscoveryClient\Entities;


class PresenceResponse implements \AngusDV\DiscoveryClient\Contracts\PresenceResponse
{
    public $ttl;

    public function loadFromJson($data):self
    {
        $this->ttl = json_decode($data, true)['data'];
        return $this;
    }

    public function getTTL()
    {
        return $this->ttl;
    }
}
