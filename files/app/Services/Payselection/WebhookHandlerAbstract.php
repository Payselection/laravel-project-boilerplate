<?php

namespace App\Services\Payselection;

use App\Exceptions\BaseException;
use PaySelection\Hook\HookPay;

abstract class WebhookHandlerAbstract
{
    private ?HookPay $hookPay = null;

    public function setHookPay(HookPay $hookPay): void
    {
        $this->hookPay = $hookPay;
    }

    protected function getHookPay(): HookPay
    {
        if (!$this->hookPay instanceof HookPay) {
            throw new BaseException('Propery hookPay is not instanceof ' . HookPay::class);
        }
        return $this->hookPay;
    }

    abstract public function payment(): bool;

    abstract public function fail(): bool;

    abstract public function refund(): bool;

    abstract public function block(): bool;

    abstract public function cancel(): bool;

    abstract public function charge(): bool;

    abstract public function redirect3DS(): bool;

    abstract public function payout(): bool;
}
