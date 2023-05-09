<?php

namespace App\Payselection\Data;

use App\Payselection\Enum\PaymentTypeEnum;
use Spatie\LaravelData\Attributes\Validation\Filled;
use Spatie\LaravelData\Data;

class ReceiptPaymentData extends Data
{
    public function __construct(
        public PaymentTypeEnum $type,
        #[Filled]
        public float $sum,
    ) {
    }
}
