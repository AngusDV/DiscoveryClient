<?php

namespace AngusDV\DiscoveryClient\Commands;

use AngusDV\DiscoveryClient\Facades\DiscoveryClient;
use Illuminate\Console\Command;

class DiscoverCommand extends Command
{
    protected $signature = 'client:discover';
    protected $description = 'Discover available services';

    public function handle()
    {
        $this->comment("start discovering...");
        $services = DiscoveryClient::discover()->getServices();
        $this->info("{$services->count()} services discovered.");
        $this->table(
            ['Name', 'Host', 'Port'],
            $services->toArray()
        );

    }
}
