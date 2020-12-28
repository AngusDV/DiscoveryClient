<?php

namespace AngusDV\DiscoveryClient\Commands;

use AngusDV\DiscoveryClient\Facades\ServiceDiscoverer;
use Illuminate\Console\Command;

class DiscoverCommand extends Command
{
    protected $signature = 'client:discover';
    protected $description = 'get all available services';

    public function handle()
    {
        $this->comment("start discovering...");
        $services = ServiceDiscoverer::discover()->getServices()->count();
        $this->info("$services services discovered.");
        $services = ServiceDiscoverer::discover()->getServices();
        $this->table(
            ['ServiceName', 'Host', 'Port'],
            $services->all(['name', 'host', 'port'])
        );

    }
}
