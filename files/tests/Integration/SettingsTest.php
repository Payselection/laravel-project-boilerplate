<?php

namespace Tests\Integration;

use App\Services\Settings;
use Faker\Generator;
use Illuminate\Container\Container;
use Illuminate\Validation\ValidationException;
use Tests\SettingsGenerator;
use Tests\WithAccount;
use Tests\TestCase;
use Tests\WithRequest;

/**
 * @todo use fake database for test
 */
class SettingsTest extends TestCase
{
    use WithAccount, WithRequest;

    public function test_save_fiiled()
    {
        $fakerSettings = (new SettingsGenerator());
        $settings = new Settings($this->account);
        $settings->save($this->getRequest($fakerSettings->get()));
        $this->assertTrue(true);
    }

    public function test_save_empty()
    {
        $settings = new Settings($this->account);
        $request = $this->getRequest([]);
        $this->assertThrows(fn() => $settings->save($request), ValidationException::class);
    }

    public function test_save_receipt_empty()
    {
        $settings = new Settings($this->account);
        $fakerSettings = (new SettingsGenerator());
        $data = $fakerSettings->get();
        $data['receiptSettings'] = [];
        $request = $this->getRequest(($data));
        $this->assertThrows(fn() => $settings->save($request), ValidationException::class);
    }

    public function test_save_invalid_site_id()
    {
        $settings = new Settings($this->account);
        $fakerSettings = new SettingsGenerator();
        $data = $fakerSettings->get();

        $values = [null, ''];
        foreach ($values as $value) {
            $data['settings']['site_id'] = $value;
            $request = $this->getRequest($data);
            $this->assertThrows(fn() => $settings->save($request), ValidationException::class);
        }
    }

    public function test_save_invalid_public_key()
    {
        $settings = new Settings($this->account);
        $fakerSettings = new SettingsGenerator();
        $data = $fakerSettings->get();
        
        $values = [null, ''];
        foreach ($values as $value) {
            $data['settings']['public_key'] = $value;
            $request = $this->getRequest($data);
            $this->assertThrows(fn() => $settings->save($request), ValidationException::class);
        }
    }

    public function test_save_invalid_secret_key()
    {
        $settings = new Settings($this->account);
        $fakerSettings = new SettingsGenerator();
        $data = $fakerSettings->get();
        
        $values = [null, ''];
        foreach ($values as $value) {
            $data['settings']['secret_key'] = $value;
            $request = $this->getRequest($data);
            $this->assertThrows(fn() => $settings->save($request), ValidationException::class);
        }
    }

   public function test_save_invalid_inn()
    {
        $faker = Container::getInstance()->make(Generator::class);
        $settings = new Settings($this->account);
        $fakerSettings = new SettingsGenerator();
        $data = $fakerSettings->get();
        
        $data['receiptSettings']['inn'] = $faker->randomNumber(null, 1);
        $request = $this->getRequest($data);
        $this->assertThrows(fn() => $settings->save($request), ValidationException::class);
        $data['receiptSettings']['inn'] = $faker->randomNumber(null, 20);
        $request = $this->getRequest($data);
        $this->assertThrows(fn() => $settings->save($request), ValidationException::class);
        $data['receiptSettings']['inn'] = 'test';
        $request = $this->getRequest($data);
        $this->assertThrows(fn() => $settings->save($request), ValidationException::class);
        $data['receiptSettings']['inn'] = '';
        $request = $this->getRequest($data);
        $this->assertThrows(fn() => $settings->save($request), ValidationException::class);
        $data['receiptSettings']['inn'] = null;
        $request = $this->getRequest($data);
        $this->assertThrows(fn() => $settings->save($request), ValidationException::class);
    }

    public function test_save_invalid_email()
    {
        $settings = new Settings($this->account);
        $fakerSettings = new SettingsGenerator();
        $data = $fakerSettings->get();

        $values = [null, '', 'test'];
        foreach ($values as $value) {
            $data['receiptSettings']['email'] = $value;
            $request = $this->getRequest($data);
            $this->assertThrows(fn() => $settings->save($request), ValidationException::class);
        }
    }

    public function test_save_invalid_address()
    {
        $settings = new Settings($this->account);
        $fakerSettings = new SettingsGenerator();
        $data = $fakerSettings->get();
        
        $values = [null, ''];
        foreach ($values as $value) {
            $data['receiptSettings']['address'] = $value;
            $request = $this->getRequest($data);
            $this->assertThrows(fn() => $settings->save($request), ValidationException::class);
        }
    }

    public function test_save_invalid_sno()
    {
        $settings = new Settings($this->account);
        $fakerSettings = new SettingsGenerator();
        $data = $fakerSettings->get();

        $values = [null, '', 'test'];
        foreach ($values as $value) {
            $data['receiptSettings']['sno'] = $value;
            $request = $this->getRequest($data);
            $this->assertThrows(fn() => $settings->save($request), ValidationException::class);
        }
    }

    public function test_save_invalid_vat()
    {
        $settings = new Settings($this->account);
        $fakerSettings = new SettingsGenerator();
        $data = $fakerSettings->get();

        $values = [null, '', 'test'];
        foreach ($values as $value) {
            $data['receiptSettings']['vat'] = $value;
            $request = $this->getRequest($data);
            $this->assertThrows(fn() => $settings->save($request), ValidationException::class);
        }
    }

    public function test_save_invalid_item_type()
    {
        $settings = new Settings($this->account);
        $fakerSettings = new SettingsGenerator();
        $data = $fakerSettings->get();

        $values = [null, '', 'test'];
        foreach ($values as $value) {
            $data['receiptSettings']['item_type'] = $value;
            $request = $this->getRequest($data);
            $this->assertThrows(fn() => $settings->save($request), ValidationException::class);
        }
    }

    public function test_save_invalid_payment_type()
    {
        $settings = new Settings($this->account);
        $fakerSettings = new SettingsGenerator();
        $data = $fakerSettings->get();

        $values = [null, '', 'test'];
        foreach ($values as $value) {
            $data['receiptSettings']['payment_type'] = $value;
            $request = $this->getRequest($data);
            $this->assertThrows(fn() => $settings->save($request), ValidationException::class);
        }
    }
}
