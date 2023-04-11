<?php

namespace App\Data\Payselection;

use App\Data\Trait\Filtered;
use Spatie\LaravelData\Attributes\Validation\Email;
use Spatie\LaravelData\Attributes\Validation\Filled;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Data;

class CustomerInfoData extends Data
{
    use Filtered;

    public function __construct(
        #[Email,
    Filled,
    Nullable]
        public ?string $Email = null,
        #[Email,
    Filled,
    Nullable]
        public ?string $ReceiptEmail = null,
        #[StringType,
    Nullable]
        public ?string $Phone = null,
        #[StringType,
    Nullable]
        public ?string $Language = null,
        #[StringType,
    Nullable]
        public ?string $Address = null,
        #[StringType,
    Nullable]
        public ?string $Town = null,
        #[StringType,
    Nullable]
        public ?string $ZIP = null,
        #[StringType,
    Nullable]
        public ?string $Country = null,
    ) {
    }
}
