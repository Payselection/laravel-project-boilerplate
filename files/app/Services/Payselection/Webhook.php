<?php

namespace App\Services\Payselection;

use App\Enum\PaySelection\EventType;
use App\Exceptions\BaseException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use PaySelection\Hook\HookPay;

class Webhook
{
    protected HookPay $hookPay;

    public function __construct()
    {
        $this->hookPay = ClientFacade::get()->hookPay();
    }

    public function handle(WebhookHandlerAbstract $handler): Response|ResponseFactory
    {
        try {
            $result = false;
            $handler->setHookPay($this->hookPay);

            switch ($this->hookPay->event) {
                case EventType::payment->value:
                    $result = $handler->payment();
                    break;

                case EventType::fail->value:
                    $result = $handler->fail();
                    break;

                case EventType::refund->value:
                    $result = $handler->refund();
                    break;

                case EventType::block->value:
                    $result = $handler->block();
                    break;

                case EventType::cancel->value:
                    $result = $handler->cancel();
                    break;

                case EventType::charge->value:
                    $result = $handler->charge();
                    break;

                case EventType::redirect3DS->value:
                    $result = $handler->redirect3DS();
                    break;

                case EventType::payout->value:
                    $result = $handler->payout();
                    break;

                default:
                    throw new BaseException('Unknown webhook event type: ' . $this->hookPay->event);
            }

            if (!$result) {
                throw new BaseException('Fail to proccess webhook');
            }
        } catch (\Exception $e) {
            throw new BaseException('Webhook error: ' . $e->getMessage(), 0, $e);
        }

        return response('', 201);
    }
}
