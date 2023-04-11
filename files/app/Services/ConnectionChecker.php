<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class ConnectionChecker
{
    public static function isDatabaseReady(?string $connection = null): bool
    {
        $isReady = true;
        try {
            DB::connection($connection)->getPdo();
        } catch (\Exception $e) {
            $isReady = false;
        }

        return $isReady;
    }

    public static function isRedisReady(?string $connection = null): bool
    {
        $isReady = true;
        try {
            Redis::connection($connection);
        } catch (\Exception $e) {
            $isReady = false;
        }

        return $isReady;
    }
}
