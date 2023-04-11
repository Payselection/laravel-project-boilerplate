<?php

namespace App\Data\Payselection;

use Spatie\LaravelData\Attributes\Validation\Filled;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Data;

class ReceiptItemData extends Data
{
    public function __construct(
        #[Filled]
        public string $name,
        #[Filled]
        public float $price,
        #[Filled]
        public float $quantity,
        #[Filled]
        public float $sum,
        #[Nullable]
        public ?string $measurement_unit = null,
        #[Filled]
        public string $payment_method,
        #[Filled]
        public string $payment_object,
        public ReceiptVatData $vat,
    ) {
    }
}
