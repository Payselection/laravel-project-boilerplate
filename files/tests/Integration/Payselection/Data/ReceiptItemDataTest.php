<?php

namespace Tests\Integration\Payselection\Data;

use App\Data\Payselection\ReceiptItemData;
use Illuminate\Support\Facades\Validator;
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
        $field = 'name';
        $values = [null, ''];
        $rules[$field] = ReceiptItemData::getValidationRules([])[$field];
        foreach ($values as $value) {
            $data[$field] = $value;
            $this->assertThrows(function () use ($data, $rules) {
                Validator::make($data, $rules)->validate();
            }, ValidationException::class);
        }
    }

    public function test_invalid_price(): void
    {
        $field = 'price';
        $values = [null, '', 1.999];
        $rules[$field] = ReceiptItemData::getValidationRules([])[$field];
        foreach ($values as $value) {
            $data[$field] = $value;
            $this->assertThrows(function () use ($data, $rules) {
                Validator::make($data, $rules)->validate();
            }, ValidationException::class);
        }
    }

    public function test_invalid_quantity(): void
    {
        $field = 'quantity';
        $values = [null, '', 1.9999];
        $rules[$field] = ReceiptItemData::getValidationRules([])[$field];
        foreach ($values as $value) {
            $data[$field] = $value;
            $this->assertThrows(function () use ($data, $rules) {
                Validator::make($data, $rules)->validate();
            }, ValidationException::class);
        }
    }

    public function test_invalid_sum(): void
    {
        $field = 'sum';
        $values = [null, '', 1.999];
        $rules[$field] = ReceiptItemData::getValidationRules([])[$field];
        foreach ($values as $value) {
            $data[$field] = $value;
            $this->assertThrows(function () use ($data, $rules) {
                Validator::make($data, $rules)->validate();
            }, ValidationException::class);
        }
    }

    public function test_invalid_payment_method(): void
    {
        $field = 'payment_method';
        $values = [null, ''];
        $rules[$field] = ReceiptItemData::getValidationRules([])[$field];
        foreach ($values as $value) {
            $data[$field] = $value;
            $this->assertThrows(function () use ($data, $rules) {
                Validator::make($data, $rules)->validate();
            }, ValidationException::class);
        }
    }

    public function test_invalid_payment_object(): void
    {
        $field = 'payment_object';
        $values = [null, ''];
        $rules[$field] = ReceiptItemData::getValidationRules([])[$field];
        foreach ($values as $value) {
            $data[$field] = $value;
            $this->assertThrows(function () use ($data, $rules) {
                Validator::make($data, $rules)->validate();
            }, ValidationException::class);
        }
    }
}
