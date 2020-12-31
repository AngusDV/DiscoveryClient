<?php


namespace AngusDV\DiscoveryClient\Entities;


use AngusDV\DiscoveryClient\Exceptions\InvalidRegistrationResponse;
use Illuminate\Support\Collection;

class DiscoveryResponse implements \AngusDV\DiscoveryClient\Contracts\DiscoveryResponse
{

    public Collection $services;
    public array $data;

    public function __construct()
    {
        $this->services = collect();
    }

    public function loadFromJson($data): \AngusDV\DiscoveryClient\Contracts\DiscoveryResponse
    {
        $json = json_decode($data, true);
        throw_unless(isset($json['data']), InvalidRegistrationResponse::class);
        return $this->setData($json['data']);
    }

    public function setData($data): self
    {
        $this->data = $data;
        return $this;
    }

    public function getServices(): Collection
    {
        foreach ($this->data as $item) {
            $this->services->add(new Service($item['name'], $item['host'], $item['port']));
        }
        return $this->services;
    }
}
