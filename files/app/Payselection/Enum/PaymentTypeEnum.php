<?php

namespace App\Payselection\Enum;

enum PaymentTypeEnum: int
{
    case cash = 0;
    case card = 1;
    case prepayment = 2;
    case postpaid = 3;
    case other = 4;
}
