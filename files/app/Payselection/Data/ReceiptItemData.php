<?php

namespace App\Payselection\Data;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Facades\Validator;
use Spatie\LaravelData\Attributes\Validation\Filled;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Data;

class ReceiptItemData extends Data
{
    public function __construct(
        #[Filled]
        public string $name,
        #[Filled]
        public float $price,
        #[Filled]
        public float $quantity,
        #[Filled]
        public float $sum,
        #[Nullable]
        public ?string $measurement_unit = null,
        #[Filled]
        public string $payment_method,
        #[Filled]
        public string $payment_object,
        public ReceiptVatData $vat,
    ) {
    }

    public static function getCustomRules(): array
    {
        return [
            'price' => 'decimal:0,2',
            'sum' => 'decimal:0,2',
            'quantity' => 'decimal:0,3',
        ];
    }

    public static function validate(Arrayable|array $payload): Arrayable|array
    {
        Validator::make((array)$payload, static::getCustomRules())->validate();

        return parent::validate($payload);
    }

    public static function getValidationRules(array $payload): array
    {
        return array_merge_recursive(parent::getValidationRules($payload), static::getCustomRules());
    }
}
