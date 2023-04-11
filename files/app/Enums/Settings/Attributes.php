<?php

namespace App\Enums\Settings;

use App\Enums\EnumDesc;
use App\Enums\EnumTitle;

enum Attributes: string implements EnumTitle, EnumDesc
{
    case site_id = 'site_id';
    case public_key = 'public_key';
    case secret_key = 'secret_key';
    case receipt = 'receipt';

    public function title(): string
    {
        $title = match ($this) {
            Attributes::site_id => __('Идентификатор (SITE-ID)'),
            Attributes::public_key => __('Public key'),
            Attributes::secret_key => __('Секретный ключ'),
            Attributes::receipt => __('Отправка чеков. Чек выпускает Payselection'),
        };
        return is_string($title) ? $title : '';
    }

    public function desc(): string
    {
        $desc = match ($this) {
            Attributes::site_id => '',
            Attributes::public_key => '',
            Attributes::secret_key => '',
            Attributes::receipt => __('b24_payment_handler.SALE_PAYSELECTION_RECEIPT_DESCR'),
        };
        return is_string($desc) ? $desc : '';
    }
}
