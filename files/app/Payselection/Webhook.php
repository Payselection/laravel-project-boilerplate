<?php

namespace App\Payselection;

use App\Payselection\Enum\EventTypeEnum;
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
        $this->hookPay = app(PayselectionClient::class)->client()->hookPay();
    }

    /**
     * @param WebhookHandlerAbstract $handler
     * @return Response|ResponseFactory
     */
    public function handle(WebhookHandlerAbstract $handler): Response|ResponseFactory
    {
        try {
            $result = false;
            $handler->setHookPay($this->hookPay);

            switch ($this->hookPay->event) {
                case EventTypeEnum::payment->value:
                    $result = $handler->payment();
                    break;

                case EventTypeEnum::fail->value:
                    $result = $handler->fail();
                    break;

                case EventTypeEnum::refund->value:
                    $result = $handler->refund();
                    break;

                case EventTypeEnum::block->value:
                    $result = $handler->block();
                    break;

                case EventTypeEnum::cancel->value:
                    $result = $handler->cancel();
                    break;

                case EventTypeEnum::charge->value:
                    $result = $handler->charge();
                    break;

                case EventTypeEnum::redirect3DS->value:
                    $result = $handler->redirect3DS();
                    break;

                case EventTypeEnum::payout->value:
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
