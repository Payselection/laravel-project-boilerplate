<?php

namespace Tests;

use App\Models\Account;

trait ModelsFactory
{
    protected function getAccount($count = 1, $params = [])
    {
        return Account::factory()->count($count)->create($params);
    }
}
