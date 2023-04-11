<?php

namespace App\Enum\PaySelection;

enum PaymentType: int
{
    case cash = 0;
    case card = 1;
    case prepayment = 2;
    case postpaid = 3;
    case other = 4;
}
