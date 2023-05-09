<?php

namespace App\Providers;

use App\Exceptions\BaseException;
use App\Payselection\Data\ClientConfigData;
use App\Payselection\PayselectionClient;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class PayselectionClientServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Example of resolving container from transaction table with route parameter transactionId
     * Feel free impement your own realization
     */
    public function register(): void
    {
        $this->app->singleton(PayselectionClient::class, function () {

            $route = Route::getCurrentRoute();
            if (!is_null($route) && $route->hasParameter('transactionId')) {
                $transactionId = $route->parameter('transactionId')
                $configData = ClientConfigData::validateAndCreate([
                    'site_id' => 'site_id',
                    'secret_key' => 'secret_key',
                    'webhook_url' => url()->current(),
                ]);
                return new PayselectionClient($configData);
            }

            throw new BaseException('Fail to resolve container ' . PayselectionClient::class);
        });
    }

    public function provides()
    {
        return [PayselectionClient::class];
    }
}
