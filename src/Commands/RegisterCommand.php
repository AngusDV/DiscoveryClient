<?php

namespace AngusDV\DiscoveryClient\Commands;

use AngusDV\DiscoveryClient\Entities\Registrar;
use AngusDV\DiscoveryClient\Facades\DiscoveryClient;
use Illuminate\Console\Command;

class RegisterCommand extends Command
{
    protected $signature = 'client:register';
    protected $description = 'Register this service on service discovery';

    public function handle()
    {
        $this->comment("start registering...");
        $ttl = DiscoveryClient::register()->getTTL();
        $this->info("next registration must be in next $ttl seconds.");
    }
}
