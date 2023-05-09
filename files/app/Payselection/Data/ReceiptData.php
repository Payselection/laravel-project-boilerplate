<?php

namespace App\Payselection\Data;

use App\Data\Trait\Filtered;
use Spatie\LaravelData\Data;

class ReceiptData extends Data
{
    use Filtered;

    public function __construct(
        public string $timestamp,
        public string $external_id,
        public ReceiptInfoData $receipt,
    ) {
    }
}
