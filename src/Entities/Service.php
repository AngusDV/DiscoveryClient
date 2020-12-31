<?php


namespace AngusDV\DiscoveryClient\Entities;


class Service
{

    protected string $name;
    protected string $host;
    protected string $port;

    public function __construct(string $name, string $host, string $port)
    {
        $this->setName($name)
            ->setHost($host)
            ->setPort($port);
    }

    public function setName($name): self
    {
        $this->name = $name;
        return $this;
    }

    public function setHost($host): self
    {
        $this->host = $host;
        return $this;
    }

    public function setPort($port): self
    {
        $this->port = $port;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getHost(): string
    {
        return $this->host;
    }

    public function getPort(): string
    {
        return $this->port;
    }

}