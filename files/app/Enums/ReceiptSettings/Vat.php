<?php

namespace App\Enums\ReceiptSettings;

use App\Enums\EnumTitle;

enum Vat: string implements EnumTitle
{
    case none = 'none';
    case vat0 = 'vat0';
    case vat10 = 'vat10';
    case vat20 = 'vat20';
    case vat110 = 'vat110';
    case vat120 = 'vat120';

    public function title(): string
    {
        $title = match ($this) {
            Vat::none => __('без НДС'),
            Vat::vat0 => __('НДС по ставке 0%'),
            Vat::vat10 => __('НДС чека по ставке 10%'),
            Vat::vat20 => __('НДС чека по ставке 20%'),
            Vat::vat110 => __('НДС чека по расчетной ставке 10/110'),
            Vat::vat120 => __('НДС чека по расчетной ставке 20/120'),
        };
        return is_string($title) ? $title : '';
    }
}
