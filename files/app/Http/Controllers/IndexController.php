<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Exceptions as AppException;
use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Services\Requests\SettingsRequest;
use App\Services\Settings;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function __invoke(Request $request): Factory|View
    {
        $action = $request->has('action') ? $request->get('action') : null;
        $result = [
            'formActionUrl' => route('index', [], false),
            'formHiddenFields' => []
        ];

        if ($action) {
            $accountModel = Account::all()->first();
            if (!$accountModel instanceof Account) {
                $accountModel = new Account();
                $accountModel->save();
            }

            switch ($action) {
                case 'save':
                    $settingsService = new Settings($accountModel);
                    $settingsModel = $settingsService->save($request);

                    $actionResult = [
                        'settings' => $settingsService->getSettings(),
                        'receiptSettings' => $settingsService->getReceiptSettings(),
                    ];
                    $result = array_merge($result, $actionResult);

                    break;
                default:
                    throw new AppException\UnsupportedRequestException('From action is not valid');
            }
        } else {
            $accountModel = new Account();
            $settingsService = new Settings($accountModel);
            $actionResult = [
                'settings' => $settingsService->getSettings(),
                'receiptSettings' => $settingsService->getReceiptSettings(),
            ];
            $result = array_merge($result, $actionResult);
        }

        // @todo change tailwind cdn to cli
        return view('index', $result);
    }
}
