<?php

namespace App\Data;

use Illuminate\Http\Request;
use Spatie\LaravelData\Attributes\Validation\Filled;
use Spatie\LaravelData\Data;

class SettingsData extends Data
{
    public function __construct(
        #[Filled]
        public string $site_id,
        #[Filled]
        public string $public_key,
        #[Filled]
        public string $secret_key,
        public bool $receipt,
    ) {
    }

    public static function fromRequest(Request $request): static
    {
        return static::validateAndCreate([
            'site_id' => $request->input('settings.site_id'),
            'public_key' => $request->input('settings.public_key'),
            'secret_key' => $request->input('settings.secret_key'),
            'receipt' => $request->has('settings.receipt'),
        ]);
    }
}
