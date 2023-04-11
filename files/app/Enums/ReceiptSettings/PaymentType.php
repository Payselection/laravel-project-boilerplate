<?php

namespace App\Enums\ReceiptSettings;

use App\Enums\EnumTitle;

enum PaymentType: string implements EnumTitle
{
    case full_payment = 'full_payment';
    case full_prepayment = 'full_prepayment';
    case prepayment = 'prepayment';
    case advance = 'advance';
    case partial_payment = 'partial_payment';
    case credit = 'credit';
    case credit_payment = 'credit_payment';

    public function title(): string
    {
        $title = match ($this) {
            PaymentType::full_payment => __('Полный расчёт'),
            PaymentType::full_prepayment => __('Предоплата 100%'),
            PaymentType::prepayment => __('Предоплата'),
            PaymentType::advance => __('Аванс'),
            PaymentType::partial_payment => __('Частичный расчёт и кредит'),
            PaymentType::credit => __('Передача в кредит'),
            PaymentType::credit_payment => __('Оплата кредита'),
        };
        return is_string($title) ? $title : '';
    }
}
