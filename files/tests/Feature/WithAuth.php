<?php

namespace Tests\Feature;

use App\Services\Auth;
use App\Services\AuthStorage;
use Tests\WithAccount;

trait WithAuth
{
    use WithAccount;
    
    protected function setAuthorization(bool $authorized): void
    {
        $account = $this->account;
        $authStorage = new AuthStorage($account->shop, $account->password, $account->insales_id);
        $authStorage->setAuthorization($authorized);
        $this->withSession([Auth::SESSION_KEY_STORAGE => $authStorage]);
    }
}
