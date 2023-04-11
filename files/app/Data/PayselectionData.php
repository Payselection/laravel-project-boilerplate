<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class PayselectionData extends Data
{
    public function __construct(
        public float $amount,
        public string $orderId,
        public string $currency,
        public string $description,
        public array $extraData,
        public array $customerInfo,
        public array $receiptInfo,
    ) {
    }
}
