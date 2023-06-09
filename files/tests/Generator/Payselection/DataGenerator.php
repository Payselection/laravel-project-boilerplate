<?php

namespace Tests\Generator\Payselection;

use App\Enum\ReceiptSettings\ItemType;
use App\Enum\ReceiptSettings\PaymentType;
use App\Enum\ReceiptSettings\Vat;
use Faker\Generator;
use Illuminate\Container\Container;

class DataGenerator
{
    /**
     * Generate params for ReceiptVatData
     * @see \App\Payselection\Data\ReceiptVatData
     * @return array
     */
    public static function makeReceiptVat(mixed $type = null): array
    {
        return [
            'type' => $type ?? Vat::none->value
        ];
    }

    /**
     * Generate params for ReceiptItemData
     * @see \App\Payselection\Data\ReceiptItemData
     * @return array
     */
    public static function makeReceiptItem(): array
    {
        $faker = Container::getInstance()->make(Generator::class);
        return [
            'name' => $faker->name(),
            'price' => 1.99,
            'quantity' => 1.999,
            'sum' => 1.99,
            'measurement_unit' => null,
            'payment_method' => PaymentType::full_payment->value,
            'payment_object' => ItemType::another->value,
            'vat' => static::makeReceiptVat(),
        ];
    }

    /**
     * Generate params for PaymentRequest
     * @see \App\Payselection\Data\PaymentRequest
     * @return array
     */
    public static function makePaymentRequest(): array
    {
        $faker = Container::getInstance()->make(Generator::class);
        return [
            'OrderId' => $faker->word(),
            'Amount' => (string)$faker->randomFloat(),
            'Currency' => $faker->word(),
            'Description' => $faker->word(),
            'ExtraData' => null,
        ];
    }

    /**
     * Generate params for CustomerInfoData
     * @see \App\Payselection\Data\CustomerInfoData
     * @return array
     */
    public static function makeCustomerInfoData(): array
    {
        $faker = Container::getInstance()->make(Generator::class);
        return [
            'Email' => $faker->email(),
            'ReceiptEmail' => $faker->email(),
            'Phone' => $faker->word(),
            'Language' => $faker->word(),
            'Address' => $faker->word(),
            'Town' => $faker->word(),
            'ZIP' => $faker->word(),
            'Country' => $faker->word(),
        ];
    }

    /**
     * Generate params for ExtraData
     * @see \App\Payselection\Data\ExtraData
     * @return array
     */
    public static function makeExtraData(): array
    {
        $faker = Container::getInstance()->make(Generator::class);
        return [
            'WebhookUrl' => $faker->url(),
            'ReturnUrl' => $faker->url(),
            'SuccessUrl' => $faker->url(),
            'DeclineUrl' => $faker->url(),
        ];
    }
}
