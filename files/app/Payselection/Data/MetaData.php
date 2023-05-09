<?php

namespace App\Payselection\Data;

use App\Data\Trait\Filtered;
use App\Payselection\Enum\WebpayPaymentTypeEnum;
use Spatie\LaravelData\Data;

class MetaData extends Data
{
    use Filtered;

    public function __construct(
        public WebpayPaymentTypeEnum $PaymentType,
    ) {
    }
}
