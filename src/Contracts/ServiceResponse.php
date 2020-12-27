<?php


namespace AngusDV\DiscoveryClient\Contracts;



use AngusDV\DiscoveryClient\Entities\Service;
use Illuminate\Support\Collection;

interface ServiceResponse
{
    public function loadFromJson($data): self;

    public function getServices(): Collection;
}
