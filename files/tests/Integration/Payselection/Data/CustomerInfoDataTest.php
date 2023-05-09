<?php

namespace Tests\Integration\Payselection\Data;

use App\Payselection\Data\CustomerInfoData;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Tests\Generator\Payselection\DataGenerator;
use Tests\TestCase;

class CustomerInfoDataTest extends TestCase
{
    public function test_success(): void
    {
        $data = DataGenerator::makeCustomerInfoData();
        CustomerInfoData::validateAndCreate($data);
        $this->assertIsArray($data);
    }

    public function test_invalid_Email(): void
    {
        $field = 'Email';
        $values = ['test'];
        $rules[$field] = CustomerInfoData::getValidationRules([])[$field];
        foreach ($values as $value) {
            $data[$field] = $value;
            $this->assertThrows(function () use ($data, $rules) {
                Validator::make($data, $rules)->validate();
            }, ValidationException::class);
        }
    }

    public function test_invalid_ReceiptEmail(): void
    {
        $field = 'ReceiptEmail';
        $values = ['test'];
        $rules[$field] = CustomerInfoData::getValidationRules([])[$field];
        foreach ($values as $value) {
            $data[$field] = $value;
            $this->assertThrows(function () use ($data, $rules) {
                Validator::make($data, $rules)->validate();
            }, ValidationException::class);
        }
    }
}
