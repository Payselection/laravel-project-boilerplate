<?php

namespace App\Data\Payselection;

use App\Data\Trait\Filtered;
use Spatie\LaravelData\Data;

class PayCreateData extends Data
{
    use Filtered;

    public function __construct(
        public MetaData $MetaData,
        public PaymentRequest $PaymentRequest,
        public ?CustomerInfoData $CustomerInfo = null,
        public ?ReceiptData $ReceiptData = null,
    ) {
    }

    public function getMetaData(): array
    {
        return $this->MetaData->filtered();
    }

    public function getPaymentRequest(): array
    {
        return $this->PaymentRequest->filtered();
    }

    public function getCustomerInfoData(): array
    {
        return $this->CustomerInfo !== null ? $this->CustomerInfo->filtered() : [];
    }

    public function getReceiptData(): array
    {
        return $this->ReceiptData !== null ? $this->ReceiptData->filtered() : [];
    }
}
