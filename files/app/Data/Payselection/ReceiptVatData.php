<?php

namespace App\Data\Payselection;

use Spatie\LaravelData\Attributes\Validation\Filled;
use Spatie\LaravelData\Data;

class ReceiptVatData extends Data
{
    public function __construct(
        #[Filled]
        public string $type,
    ) {
    }
}
