<?php

namespace App\Data\Payselection;

use App\Data\Trait\Filtered;
use Spatie\LaravelData\Attributes\Validation\Filled;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Attributes\Validation\Url;
use Spatie\LaravelData\Data;

class ExtraData extends Data
{
    use Filtered;

    public function __construct(
        #[Url]
        public string $WebhookUrl,
        #[Url, Nullable]
        public ?string $ReturnUrl = null,
        #[Url, Nullable]
        public ?string $SuccessUrl = null,
        #[Url, Nullable]
        public ?string $DeclineUrl = null,
    ) {
    }
}
