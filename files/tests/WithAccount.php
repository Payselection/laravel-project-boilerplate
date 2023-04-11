<?php

namespace Tests;

use App\Models\Account;
use Tests\ModelsFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;

trait WithAccount
{
    use RefreshDatabase, ModelsFactory;

    protected Account $account;

    public function setUp(): void
    {
        parent::setUp();

        $this->account = $this->getAccount()->first();
    }
}
