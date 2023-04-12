<?php

namespace Tests\Integration\Payselection\Data;

use App\Data\Payselection\ExtraData;
use Illuminate\Validation\ValidationException;
use Tests\Generator\Payselection\DataGenerator;
use Tests\TestCase;

class ExtraDataTest extends TestCase
{
    public function test_success(): void
    {
        $data = DataGenerator::makeExtraData();
        ExtraData::validateAndCreate($data);
        $this->assertIsArray($data);
    }

    public function test_invalid_WebhookUrl(): void
    {
        $data = DataGenerator::makeExtraData();
        $values = [null, '', 'test'];
        foreach ($values as $value) {
            $data['WebhookUrl'] = $value;
            $this->assertThrows(function () use ($data) {
                ExtraData::validateAndCreate($data);
            }, ValidationException::class);
        }
    }

    public function test_invalid_ReturnUrl(): void
    {
        $data = DataGenerator::makeExtraData();
        $values = ['test'];
        foreach ($values as $value) {
            $data['ReturnUrl'] = $value;
            $this->assertThrows(function () use ($data) {
                ExtraData::validateAndCreate($data);
            }, ValidationException::class);
        }
    }

    public function test_invalid_SuccessUrl(): void
    {
        $data = DataGenerator::makeExtraData();
        $values = ['test'];
        foreach ($values as $value) {
            $data['SuccessUrl'] = $value;
            $this->assertThrows(function () use ($data) {
                ExtraData::validateAndCreate($data);
            }, ValidationException::class);
        }
    }

    public function test_invalid_DeclineUrl(): void
    {
        $data = DataGenerator::makeExtraData();
        $values = ['test'];
        foreach ($values as $value) {
            $data['DeclineUrl'] = $value;
            $this->assertThrows(function () use ($data) {
                ExtraData::validateAndCreate($data);
            }, ValidationException::class);
        }
    }
}
