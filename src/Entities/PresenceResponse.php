<?php


namespace AngusDV\DiscoveryClient\Entities;




class PresenceResponse implements \AngusDV\DiscoveryClient\Contracts\PresenceResponse
{

    public $ttl;

    public static function loadFromJson($data)
    {
        $response = new static();
        $response->ttl = json_decode($data,true)['data'];

        return $response;
    }

    public function getTTL()
    {
        return $this->ttl;
    }
}
