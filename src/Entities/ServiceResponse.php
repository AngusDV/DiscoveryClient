<?php


namespace AngusDV\DiscoveryClient\Entities;


use Illuminate\Support\Collection;

class ServiceResponse implements \AngusDV\DiscoveryClient\Contracts\ServiceResponse
{

    public Collection $services;
    public array $data;

    public function __construct()
    {
        $this->services = collect();
    }

    public function loadFromJson($data): \AngusDV\DiscoveryClient\Contracts\ServiceResponse
    {
        return $this->setData(json_decode($data, true)['data']);
    }

    public function setData($data)
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
