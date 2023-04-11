<?php

namespace App\Data\Payselection;

use App\Data\Trait\Filtered;
use App\Enum\PaySelection\WebpayPaymentType;
use Spatie\LaravelData\Data;

class MetaData extends Data
{
    use Filtered;

    public function __construct(
        public WebpayPaymentType $PaymentType,
    ) {
    }
}
