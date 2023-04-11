<?php

namespace Tests\Integration\Payselection\Data;

use App\Data\Payselection\ReceiptItemData;
use Illuminate\Validation\ValidationException;
use Tests\Generator\Payselection\DataGenerator;
use Tests\TestCase;

class ReceiptItemDataTest extends TestCase
{
    public function test_success(): void
    {
        $data = DataGenerator::makeReceiptItem();
        ReceiptItemData::validateAndCreate($data);
        $this->assertIsArray($data);
    }

    public function test_invalid_name(): void
    {
        $data = DataGenerator::makeReceiptItem();
        $values = [null, ''];
        foreach ($values as $value) {
            $data['name'] = $value;
            $this->assertThrows(function () use ($data) {
                ReceiptItemData::validateAndCreate($data);
            }, ValidationException::class);
        }
    }

    public function test_invalid_price(): void
    {
        $data = DataGenerator::makeReceiptItem();
        $values = [null, ''];
        foreach ($values as $value) {
            $data['price'] = $value;
            $this->assertThrows(function () use ($data) {
                ReceiptItemData::validateAndCreate($data);
            }, ValidationException::class);
        }
    }

    public function test_invalid_quantity(): void
    {
        $data = DataGenerator::makeReceiptItem();
        $values = [null, ''];
        foreach ($values as $value) {
            $data['quantity'] = $value;
            $this->assertThrows(function () use ($data) {
                ReceiptItemData::validateAndCreate($data);
            }, ValidationException::class);
        }
    }

    public function test_invalid_sum(): void
    {
        $data = DataGenerator::makeReceiptItem();
        $values = [null, ''];
        foreach ($values as $value) {
            $data['sum'] = $value;
            $this->assertThrows(function () use ($data) {
                ReceiptItemData::validateAndCreate($data);
            }, ValidationException::class);
        }
    }

    public function test_invalid_payment_method(): void
    {
        $data = DataGenerator::makeReceiptItem();
        $values = [null, ''];
        foreach ($values as $value) {
            $data['payment_method'] = $value;
            $this->assertThrows(function () use ($data) {
                ReceiptItemData::validateAndCreate($data);
            }, ValidationException::class);
        }
    }

    public function test_invalid_payment_object(): void
    {
        $data = DataGenerator::makeReceiptItem();
        $values = [null, ''];
        foreach ($values as $value) {
            $data['payment_object'] = $value;
            $this->assertThrows(function () use ($data) {
                ReceiptItemData::validateAndCreate($data);
            }, ValidationException::class);
        }
    }
}
