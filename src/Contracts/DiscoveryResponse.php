<?php


namespace AngusDV\DiscoveryClient\Contracts;



use AngusDV\DiscoveryClient\Entities\Service;
use Illuminate\Support\Collection;

interface DiscoveryResponse
{
    public function loadFromJson($data): self;

    public function loadFromArray($data): self;

    public function getServices(): Collection;
}
