<?php

namespace AngusDV\DiscoveryClient\Commands;

use AngusDV\DiscoveryClient\Entities\Presence;
use Illuminate\Console\Command;

class PresenceCommand extends Command
{
    protected $signature = 'client:presence';
    protected $description = 'presence this service on service discovery';

    public function handle()
    {
        $this->comment("start presencing...");
        $ttl = (new \AngusDV\DiscoveryClient\Entities\Presence())->presence()->getTTL();
        $this->info("next presence should be in $ttl seconds.");
    }
}
