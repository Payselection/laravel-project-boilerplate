<?php

namespace App\Enum\PaySelection;

enum WebpayPaymentType: string
{
    case pay = 'Pay';
    case block = 'Block';
}
