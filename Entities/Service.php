<?php


namespace DiscoveryClient\Entities;


class Service
{

    public $name;
    public $host;
    public $port;

    public function __construct($name, $host, $port)
    {
        $this->name = $name;
        $this->host = $host;
        $this->port = $port;
    }

}