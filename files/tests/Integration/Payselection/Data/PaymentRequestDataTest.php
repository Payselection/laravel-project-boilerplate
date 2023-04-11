<?php

namespace Tests\Integration\Payselection\Data;

use App\Data\Payselection\PaymentRequest;
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
        $data = DataGenerator::makePaymentRequest();
        $values = [null, ''];
        foreach ($values as $value) {
            $data['OrderId'] = $value;
            $this->assertThrows(function () use ($data) {
                PaymentRequest::validateAndCreate($data);
            }, ValidationException::class);
        }
    }

    public function test_invalid_Amount(): void
    {
        $data = DataGenerator::makePaymentRequest();
        $values = [null, ''];
        foreach ($values as $value) {
            $data['Amount'] = $value;
            $this->assertThrows(function () use ($data) {
                PaymentRequest::validateAndCreate($data);
            }, ValidationException::class);
        }
    }

    public function test_invalid_Currency(): void
    {
        $data = DataGenerator::makePaymentRequest();
        $values = [null, ''];
        foreach ($values as $value) {
            $data['Currency'] = $value;
            $this->assertThrows(function () use ($data) {
                PaymentRequest::validateAndCreate($data);
            }, ValidationException::class);
        }
    }

    public function test_invalid_Description(): void
    {
        $data = DataGenerator::makePaymentRequest();
        $values = [null, ''];
        foreach ($values as $value) {
            $data['Description'] = $value;
            $this->assertThrows(function () use ($data) {
                PaymentRequest::validateAndCreate($data);
            }, ValidationException::class);
        }
    }
}
