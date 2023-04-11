<?php

namespace Tests;

use App\Enum\ReceiptSettings\ItemType;
use App\Enum\ReceiptSettings\PaymentType;
use App\Enum\ReceiptSettings\Sno;
use App\Enum\ReceiptSettings\Vat;
use Faker\Generator;
use Illuminate\Container\Container;

class SettingsGenerator
{

    protected function makeDefault(): array
    {
        $faker = Container::getInstance()->make(Generator::class);
        $data = [
            'settings' => [
                'site_id' => $faker->word(),
                'public_key' => $faker->word(),
                'secret_key' => $faker->word(),
                'receipt' => '1',
            ],
            'receiptSettings' => [
                'inn' => '0100000000',
                'email' => $faker->email(),
                'address' => $faker->address(),
                'sno' => Sno::osn->value,
                'vat' => Vat::none->value,
                'item_type' => ItemType::award->value,
                'payment_type' => PaymentType::full_payment->value,
            ]
        ];
        return $data;
    }

    public function get(): array
    {
        return $this->makeDefault();
    }
}
