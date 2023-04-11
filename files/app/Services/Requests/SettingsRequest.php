<?php

declare(strict_types=1);

namespace App\Services\Requests;

use App\Data\ReceiptSettingsData;
use App\Data\SettingsData;
use App\Services\Requests\AbstractRequest;
use Illuminate\Http\Request;

class SettingsRequest extends AbstractRequest
{
    /**
     * @param \Illuminate\Http\Request $request
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    /**
     * @return SettingsData
     */
    public function getSettingsData(): SettingsData
    {
        $requestData = $this->getRequest()->get('settings');
        $requestData['receipt'] = isset($requestData['receipt']);
        return new SettingsData(
            $requestData['site_id'],
            $requestData['public_key'],
            $requestData['secret_key'],
            $requestData['receipt'],
        );
    }

    /**
     * @return ReceiptSettingsData
     */
    public function getReceiptSettingsData(): ReceiptSettingsData
    {
        $requestData = $this->getRequest()->get('receiptSettings');
        return new ReceiptSettingsData(
            $requestData['inn'],
            $requestData['email'],
            $requestData['address'],
            $requestData['sno'],
            $requestData['vat'],
            $requestData['item_type'],
            $requestData['payment_type'],
        );
    }
}
