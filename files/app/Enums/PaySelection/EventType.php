<?php

namespace App\Enums\PaySelection;

enum EventType: string
{
    case payment = 'Payment';
    case fail = 'Fail';
    case refund = 'Refund';
}
