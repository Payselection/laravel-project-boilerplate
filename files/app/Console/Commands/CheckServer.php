<?php

namespace App\Console\Commands;

use App\Services\ConnectionChecker;
use Illuminate\Console\Command;

class CheckServer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-server';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check server';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $checker = new ConnectionChecker();
        echo 'database: ' . ($checker->isDatabaseReady() ? 'ok' : 'fail') . "\n";
        echo 'redis: ' . ($checker->isRedisReady() ? 'ok' : 'fail') . "\n";
    }
}
