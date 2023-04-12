<?php

namespace App\Data;

use App\Enum\ReceiptSettings\ItemType;
use App\Enum\ReceiptSettings\PaymentType;
use App\Enum\ReceiptSettings\Sno;
use App\Enum\ReceiptSettings\Vat;
use Illuminate\Http\Request;
use Spatie\LaravelData\Attributes\Validation\DigitsBetween;
use Spatie\LaravelData\Attributes\Validation\Email;
use Spatie\LaravelData\Attributes\Validation\Enum;
use Spatie\LaravelData\Attributes\Validation\Filled;
use Spatie\LaravelData\Attributes\Validation\Numeric;
use Spatie\LaravelData\Data;

class ReceiptSettingsData extends Data
{
    public function __construct(
        #[Numeric, DigitsBetween(10, 12)]
        public string $inn,
        #[Email]
        public string $email,
        #[Filled]
        public string $address,
        #[Enum(Sno::class)]
        public string $sno,
        #[Enum(Vat::class)]
        public string $vat,
        #[Enum(ItemType::class)]
        public string $item_type,
        #[Enum(PaymentType::class)]
        public string $payment_type,
    ) {
    }

    public static function fromRequest(Request $request): self
    {
        return static::validateAndCreate([
            'inn' => $request->input('receiptSettings.inn'),
            'email' => $request->input('receiptSettings.email'),
            'address' => $request->input('receiptSettings.address'),
            'sno' => $request->input('receiptSettings.sno'),
            'vat' => $request->input('receiptSettings.vat'),
            'item_type' => $request->input('receiptSettings.item_type'),
            'payment_type' => $request->input('receiptSettings.payment_type'),
        ]);
    }
}
