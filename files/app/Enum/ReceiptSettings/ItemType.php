<?php

namespace App\Enum\ReceiptSettings;

use App\Enum\EnumTitle;

enum ItemType: string implements EnumTitle
{
    case award = 'award';
    case commodity = 'commodity';
    case excise = 'excise';
    case job = 'job';
    case service = 'service';
    case payment = 'payment';

    public function title(): string
    {
        $title = match ($this) {
            ItemType::award => __('Иной предмет расчёта'),
            ItemType::commodity => __('Товар'),
            ItemType::excise => __('Подакцизный товар'),
            ItemType::job => __('Работа'),
            ItemType::service => __('Услуга'),
            ItemType::payment => __('Платёж'),
        };
        return is_string($title) ? $title : '';
    }
}
