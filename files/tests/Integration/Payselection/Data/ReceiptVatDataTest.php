<?php

namespace Tests\Integration\Payselection\Data;

use App\Data\Payselection\ReceiptVatData;
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

    public function test_invalid_data()
    {
        $data = DataGenerator::makeReceiptVat();
        $values = [null, ''];
        foreach ($values as $value) {
            $data['type'] = $value;
            $this->assertThrows(function () use ($data) {
                ReceiptVatData::validateAndCreate($data);
            }, ValidationException::class);
        }
    }
}
