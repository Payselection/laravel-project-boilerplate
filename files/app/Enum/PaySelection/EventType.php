<?php

namespace App\Enum\PaySelection;

enum EventType: string
{
    case payment = 'Payment';
    case fail = 'Fail';
    case refund = 'Refund';
    case block = 'Block';
    case cancel = 'Cancel';
    case charge = '3DS';
    case redirect3DS = 'Redirect3DS';
    case payout = 'Payout';
}
