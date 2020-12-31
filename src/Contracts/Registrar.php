<?php


namespace AngusDV\DiscoveryClient\Contracts;


interface Registrar
{
    public function register(): self;

    public function getTTL();
}