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
        $presence = new \AngusDV\DiscoveryClient\Entities\Presence();
        $presence->presence();
    }
}
