<?php

namespace App\Services\Payselection;

use PaySelection\Library;

class Client
{
    private Library $client;

    public function __construct(string $siteId, string $secretKey, string $webhookUrl = '')
    {
        $client = new Library();
        $client->setConfiguration(['site_id' => $siteId, 'secret_key' => $secretKey, 'webhook_url' => $webhookUrl]);
        $this->client = $client;
    }

    public function get(): Library
    {
        return $this->client;
    }
}
