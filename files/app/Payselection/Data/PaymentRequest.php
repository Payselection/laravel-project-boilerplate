<?php

namespace App\Payselection\Data;

use App\Data\Trait\Filtered;
use Spatie\LaravelData\Attributes\Validation\Filled;
use Spatie\LaravelData\Data;

class PaymentRequest extends Data
{
    use Filtered;

    public function __construct(
        #[Filled]
        public string $OrderId,
        #[Filled]
        public string $Amount,
        #[Filled]
        public string $Currency,
        #[Filled]
        public string $Description,
        public ?ExtraData $ExtraData = null,
    ) {
    }
}
