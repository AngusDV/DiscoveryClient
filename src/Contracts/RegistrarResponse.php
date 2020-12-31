<?php


namespace AngusDV\DiscoveryClient\Contracts;


interface RegistrarResponse
{
    public function loadFromJson($data);

    public function getTTL();
}
