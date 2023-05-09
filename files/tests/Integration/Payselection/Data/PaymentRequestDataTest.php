<?php

namespace Tests\Integration\Payselection\Data;

use App\Payselection\Data\PaymentRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Tests\Generator\Payselection\DataGenerator;
use Tests\TestCase;

class PaymentRequestDataTest extends TestCase
{
    public function test_success(): void
    {
        $data = DataGenerator::makePaymentRequest();
        PaymentRequest::validateAndCreate($data);
        $this->assertIsArray($data);
    }

    public function test_invalid_OrderId(): void
    {
        $field = 'OrderId';
        $values = [null, ''];
        $rules[$field] = PaymentRequest::getValidationRules([])[$field];
        foreach ($values as $value) {
            $data[$field] = $value;
            $this->assertThrows(function () use ($data, $rules) {
                Validator::make($data, $rules)->validate();
            }, ValidationException::class);
        }
    }

    public function test_invalid_Amount(): void
    {
        $field = 'Amount';
        $values = [null, ''];
        $rules[$field] = PaymentRequest::getValidationRules([])[$field];
        foreach ($values as $value) {
            $data[$field] = $value;
            $this->assertThrows(function () use ($data, $rules) {
                Validator::make($data, $rules)->validate();
            }, ValidationException::class);
        }
    }

    public function test_invalid_Currency(): void
    {
        $field = 'Currency';
        $values = [null, ''];
        $rules[$field] = PaymentRequest::getValidationRules([])[$field];
        foreach ($values as $value) {
            $data[$field] = $value;
            $this->assertThrows(function () use ($data, $rules) {
                Validator::make($data, $rules)->validate();
            }, ValidationException::class);
        }
    }

    public function test_invalid_Description(): void
    {
        $field = 'Description';
        $values = [null, ''];
        $rules[$field] = PaymentRequest::getValidationRules([])[$field];
        foreach ($values as $value) {
            $data[$field] = $value;
            $this->assertThrows(function () use ($data, $rules) {
                Validator::make($data, $rules)->validate();
            }, ValidationException::class);
        }
    }
}
