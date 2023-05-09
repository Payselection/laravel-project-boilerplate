<?php

namespace App\Payselection\Enum;

enum WebpayPaymentTypeEnum: string
{
    case pay = 'Pay';
    case block = 'Block';
}
