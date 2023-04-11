<?php

namespace Tests\Feature;

use App\Exceptions\UnsupportedRequestException;
use Tests\SettingsGenerator;
use Tests\TestCase;

/**
 * @todo use fake database for test
 */
class SettingsTest extends TestCase
{
    use WithAuth;

    public function test_unathorized()
    {
        $route = route('settings');
        $this->get($route)->assertViewIs('unauthorized');
    }

    public function test_index()
    {
        $this->setAuthorization(true);
        $route = route('settings');
        $this->get($route)->assertViewIs('settings');
    }

    public function test_invalid_action()
    {
        $this->setAuthorization(true);
        $route = route('settings');
        $params = [
            'action' => 'invalid_action'
        ];
        $this->expectException(UnsupportedRequestException::class);
        $this->withoutExceptionHandling()->post($route, $params);
    }

    public function test_save_action()
    {
        $fakerSettings = (new SettingsGenerator());
        $this->setAuthorization(true);
        $route = route('settings');
        $params = array_merge(['action' => 'save'], $fakerSettings->get());
        $this->withoutExceptionHandling()->post($route, $params)->assertSuccessful()->assertViewIs('settings');
    }
}
