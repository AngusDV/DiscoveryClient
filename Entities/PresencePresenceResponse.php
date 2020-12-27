<?php


namespace DiscoveryClient\Entities;


use DiscoveryClient\Contracts\PresenceResponse;

class PresencePresenceResponse implements PresenceResponse
{

    public $ttl;

    public static function loadFromJson($data)
    {
        $response = new static();
        $response->ttl = json_decode($data)['data'];
        return $response;
    }

    public function getTTL()
    {
        return $this->ttl;
    }
}
