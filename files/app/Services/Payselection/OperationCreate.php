<?php

namespace App\Services\Payselection;

use App\Data\Payselection\PayCreateData;
use App\Exceptions\BaseException;

class OperationCreate
{
    public function __construct(
        protected PayCreateData $data,
    ) {
    }

    public function make(): string
    {
        $response = ClientFacade::get()->createWebPay($this->data->filtered());
        if (!$response->redirectUrl) {
            throw new BaseException('Redirect url is missing');
        }
        return $response->redirectUrl;
    }
}
