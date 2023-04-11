<?php

namespace App\Enum\ReceiptSettings;

use App\Enum\EnumTitle;

enum Sno: string implements EnumTitle
{
    case osn = 'osn';
    case usn_income = 'usn_income';
    case usn_income_outcome = 'usn_income_outcome';
    case envd = 'envd';
    case esn = 'esn';
    case patent = 'patent';

    public function title(): string
    {
        $title = match ($this) {
            Sno::osn => __('Общая'),
            Sno::usn_income => __('Упрощённая, доход'),
            Sno::usn_income_outcome => __('Упрощённая, доход минус расход'),
            Sno::envd => __('Единый налог на вменённый доход'),
            Sno::esn => __('Единый сельскохозяйственный налог'),
            Sno::patent => __('Патентная система налогообложения'),
        };
        return is_string($title) ? $title : '';
    }
}
