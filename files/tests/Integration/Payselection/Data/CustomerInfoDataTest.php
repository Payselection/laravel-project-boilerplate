<?php

namespace Tests\Integration\Payselection\Data;

use App\Data\Payselection\CustomerInfoData;
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
        $data = DataGenerator::makeCustomerInfoData();
        $values = ['test'];
        foreach ($values as $value) {
            $data['Email'] = $value;
            $this->assertThrows(function () use ($data) {
                CustomerInfoData::validateAndCreate($data);
            }, ValidationException::class);
        }
    }

    public function test_invalid_ReceiptEmail(): void
    {
        $data = DataGenerator::makeCustomerInfoData();
        $values = ['test'];
        foreach ($values as $value) {
            $data['ReceiptEmail'] = $value;
            $this->assertThrows(function () use ($data) {
                CustomerInfoData::validateAndCreate($data);
            }, ValidationException::class);
        }
    }
}
