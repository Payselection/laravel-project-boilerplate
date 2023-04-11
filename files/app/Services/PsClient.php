<?php

namespace App\Services;

use Exception;
use PaySelection\Library;

class PsClient
{
    private static ?Library $instance = null;

    public static function set(string $siteId, string $secretKey, string $webhookUrl = ''): void
    {
        $psClient = new Library();
        $psClient->setConfiguration(['site_id' => $siteId, 'secret_key' => $secretKey, 'webhook_url' => $webhookUrl]);
        self::$instance = $psClient;
    }

    public static function has(): bool
    {
        return self::$instance instanceof Library;
    }

    public static function get(): Library
    {
        if (!self::$instance instanceof Library) {
            throw new Exception('Instance of ' . Library::class . ' is missing');
        }
        return self::$instance;
    }
}
