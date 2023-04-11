<?php

namespace App\Services\Trait;

use App\Services\PsClient;
use PaySelection\Library;

trait HasPsClient
{
    public function psClient(): Library
    {
        return PsClient::get();
    }
}
