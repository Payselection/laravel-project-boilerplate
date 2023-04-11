<?php

namespace App\Data\Payselection;

use App\Data\Trait\Filtered;
use Spatie\LaravelData\Attributes\Validation\Filled;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class ReceiptInfoData extends Data
{
    use Filtered;

    public function __construct(
        #[Filled]
        public array $client,
        #[Filled]
        public array $company,
        #[Filled]
        public float $total,
        /** @var \Spatie\LaravelData\DataCollection<int, ReceiptPaymentData> */
        public DataCollection $payments,
        /** @var \Spatie\LaravelData\DataCollection<int, ReceiptItemData> */
        public DataCollection $items,
    ) {
    }
}
