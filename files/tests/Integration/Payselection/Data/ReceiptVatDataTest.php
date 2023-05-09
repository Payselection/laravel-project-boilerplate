<?php

namespace Tests\Integration\Payselection\Data;

use App\Payselection\Data\ReceiptVatData;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Tests\Generator\Payselection\DataGenerator;
use Tests\TestCase;

class ReceiptVatDataTest extends TestCase
{
    public function test_success(): void
    {
        $data = DataGenerator::makeReceiptVat();
        ReceiptVatData::validateAndCreate($data);
        $this->assertIsArray($data);
    }

    public function test_invalid_type()
    {
        $field = 'type';
        $values = [null, ''];
        $rules[$field] = ReceiptVatData::getValidationRules([])[$field];
        foreach ($values as $value) {
            $data[$field] = $value;
            $this->assertThrows(function () use ($data, $rules) {
                Validator::make($data, $rules)->validate();
            }, ValidationException::class);
        }
    }
}
