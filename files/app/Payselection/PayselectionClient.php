<?php

namespace App\Payselection;

use App\Payselection\Data\ClientConfigData;
use PaySelection\Library;

class PayselectionClient
{
    private Library $client;

    /**
     * @param ClientConfigData $config
     */
    public function __construct(ClientConfigData $config)
    {
        $client = new Library();
        $client->setConfiguration([
            'site_id' => $config->site_id,
            'secret_key' => $config->secret_key,
            'webhook_url' => $config->webhook_url
        ]);
        $this->client = $client;
    }

    /**
     * @return Library
     */
    public function client(): Library
    {
        return $this->client;
    }
}
