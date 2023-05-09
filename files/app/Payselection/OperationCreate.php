<?php

namespace App\Payselection;

use App\Payselection\Data\PayCreateData;
use App\Exceptions\BaseException;

class OperationCreate
{
    /**
     * @param PayCreateData $data
     */
    public function __construct(
        protected PayCreateData $data,
    ) {
    }

    /**
     * @return string
     */
    public function make(): string
    {
        $response = app(PayselectionClient::class)->client()->createWebPay($this->data->filtered());
        if (!$response->redirectUrl) {
            throw new BaseException('Redirect url is missing');
        }
        return $response->redirectUrl;
    }
}
