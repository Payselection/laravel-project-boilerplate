<?php

namespace App\Data\Payselection;

use App\Enum\PaySelection\PaymentType;
use Spatie\LaravelData\Attributes\Validation\Filled;
use Spatie\LaravelData\Data;

class ReceiptPaymentData extends Data
{
    public function __construct(
        public PaymentType $type,
        #[Filled]
        public float $sum,
    ) {
    }
}
