<?php

namespace App\Services\Payselection;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Facade;

/**
* @method static \PaySelection\Library get()
*
* @see \App\Services\Payselection\Client
*/
class ClientFacade extends Facade
{
    public static function setInstance(string $siteId, string $secretKey, string $webhookUrl = ''): void
    {
        if (!App::isShared(Client::class)) {
            App::instance(Client::class, new Client($siteId, $secretKey, $webhookUrl));
        }
    }

    protected static function getFacadeAccessor(): string
    {
        return Client::class;
    }
}
