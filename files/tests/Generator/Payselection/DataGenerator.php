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
     * @see \App\Data\Payselection\ReceiptVatData
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
     * @see \App\Data\Payselection\ReceiptItemData
     * @return array
     */
    public static function makeReceiptItem(): array
    {
        $faker = Container::getInstance()->make(Generator::class);
        return [
            'name' => $faker->name(),
            'price' => $faker->randomFloat(),
            'quantity' => 1,
            'sum' => $faker->randomFloat(),
            'measurement_unit' => null,
            'payment_method' => PaymentType::full_payment->value,
            'payment_object' => ItemType::award->value,
            'vat' => static::makeReceiptVat(),
        ];
    }

    /**
     * Generate params for PaymentRequest
     * @see \App\Data\Payselection\PaymentRequest
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
     * @see \App\Data\Payselection\CustomerInfoData
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
     * @see \App\Data\Payselection\ExtraData
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
