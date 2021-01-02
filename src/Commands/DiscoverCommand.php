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
        $services = DiscoveryClient::getServices();
        $this->info("{$services->count()} services discovered.");
        $this->table(
            ['Name', 'Host', 'Port'],
            $services->map(function ($item){
                return [$item->getName(),$item->getHost(),$item->getPort()];
            })
        );

    }
}
