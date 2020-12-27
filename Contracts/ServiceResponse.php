<?php


namespace DiscoveryClient\Contracts;



use DiscoveryClient\Entities\Service;
use Illuminate\Support\Collection;

interface ServiceResponse
{
    public function loadFromJson(array $data): self;

    public function getServices(): Collection;
}