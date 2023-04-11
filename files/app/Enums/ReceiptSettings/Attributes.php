<?php

namespace App\Enums\ReceiptSettings;

use App\Enums\EnumDesc;
use App\Enums\EnumTitle;

enum Attributes: string implements EnumTitle, EnumDesc
{
    case inn = 'inn';
    case email = 'email';
    case address = 'address';
    case sno = 'sno';
    case vat = 'vat';
    case item_type = 'item_type';
    case payment_type = 'payment_type';

    public function title(): string
    {
        $title = match ($this) {
            Attributes::inn => __('ИНН организации'),
            Attributes::email => __('Email организации'),
            Attributes::address => __('Юридический адрес'),
            Attributes::sno => __('Система налогообложения'),
            Attributes::vat => __('Ставка НДС для всех позиций'),
            Attributes::item_type => __('Тип оплачиваемой позиции'),
            Attributes::payment_type => __('Тип оплаты'),
        };
        return is_string($title) ? $title : '';
    }

    public function desc(): string
    {
        $desc = match ($this) {
            Attributes::inn => '',
            Attributes::email => '',
            Attributes::address => '',
            Attributes::sno => '',
            Attributes::vat => __('b24_payment_handler.SALE_PAYSELECTION_NDS_DESCR'),
            Attributes::item_type => '',
            Attributes::payment_type => '',
        };
        return is_string($desc) ? $desc : '';
    }
}
