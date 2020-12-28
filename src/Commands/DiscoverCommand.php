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
        ServiceDiscoverer::discover();
    }
}
