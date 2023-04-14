<?php

namespace Tests\Integration\Payselection\Data;

use App\Data\Payselection\ExtraData;
use Illuminate\Support\Facades\Validator;
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
        $field = 'WebhookUrl';
        $values = [null, '', 'test'];
        $rules[$field] = ExtraData::getValidationRules([])[$field];
        foreach ($values as $value) {
            $data[$field] = $value;
            $this->assertThrows(function () use ($data, $rules) {
                Validator::make($data, $rules)->validate();
            }, ValidationException::class);
        }
    }

    public function test_invalid_ReturnUrl(): void
    {
        $field = 'ReturnUrl';
        $values = ['test'];
        $rules[$field] = ExtraData::getValidationRules([])[$field];
        foreach ($values as $value) {
            $data[$field] = $value;
            $this->assertThrows(function () use ($data, $rules) {
                Validator::make($data, $rules)->validate();
            }, ValidationException::class);
        }
    }

    public function test_invalid_SuccessUrl(): void
    {
        $field = 'SuccessUrl';
        $values = ['test'];
        $rules[$field] = ExtraData::getValidationRules([])[$field];
        foreach ($values as $value) {
            $data[$field] = $value;
            $this->assertThrows(function () use ($data, $rules) {
                Validator::make($data, $rules)->validate();
            }, ValidationException::class);
        }
    }

    public function test_invalid_DeclineUrl(): void
    {
        $field = 'DeclineUrl';
        $values = ['test'];
        $rules[$field] = ExtraData::getValidationRules([])[$field];
        foreach ($values as $value) {
            $data[$field] = $value;
            $this->assertThrows(function () use ($data, $rules) {
                Validator::make($data, $rules)->validate();
            }, ValidationException::class);
        }
    }
}
