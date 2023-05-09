<?php

namespace App\Payselection\Data;

use App\Data\Trait\Filtered;
use Spatie\LaravelData\Attributes\Validation\Filled;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Attributes\Validation\Url;
use Spatie\LaravelData\Data;

class ClientConfigData extends Data
{
    use Filtered;

    public function __construct(
        #[Filled]
        public string $site_id,
        #[Filled]
        public string $secret_key,
        #[Url, Nullable]
        public ?string $webhook_url = null,
    ) {
    }
}
