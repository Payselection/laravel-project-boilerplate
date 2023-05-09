<?php

namespace App\Services;

use App\Data\ReceiptSettingsData;
use App\Data\SettingsData;
use App\Exceptions\BaseException;
use App\Models\ReceiptSetting;
use App\Models\Setting;
use App\Models\SettingableModel;
use Illuminate\Http\Request;

class Settings
{
    protected SettingableModel $model;
    protected Setting $settings;
    protected ReceiptSetting $receiptSettings;

    /**
     * @param SettingableModel $model
     */
    public function __construct(SettingableModel $model)
    {
        $settings = $model->settings()->first();
        if (!$settings instanceof Setting) {
            $settings = new Setting();
        }
        $receiptSettings = $settings->receiptSettings()->first();
        if (!$receiptSettings instanceof ReceiptSetting) {
            $receiptSettings = new ReceiptSetting();
        }
        if (!$model->exists()) {
            throw new BaseException('Attached model record not exists ' . $model::class);
        }
        $this->model = $model;
        $this->settings = $settings;
        $this->receiptSettings = $receiptSettings;
    }

    /**
     * @param Request $request
     * @return Setting
     */
    public function save(Request $request): Setting
    {
        $settingsData = SettingsData::fromRequest($request);

        if (!$this->settings->exists) {
            $this->settings->settingable_id =  $this->model->id;
            $this->settings->settingable_type =  $this->model::class;
        }
        $this->settings->fill($settingsData->toArray());
        $this->settings->save();

        if (!$this->receiptSettings->exists) {
            $this->receiptSettings->setting_id =  $this->settings->id;
        }

        if ($settingsData->receipt) {
            $receiptSettingsData = ReceiptSettingsData::fromRequest($request);
            $this->receiptSettings->fill($receiptSettingsData->toArray());
            $this->receiptSettings->save();
        }

        return $this->settings;
    }

    /**
     * @return void
     */
    public function delete(): void
    {
        $this->model->settings()->each(function (Setting $settings) {
            $settings->delete();
        });
    }

    /**
     * @return Setting
     */
    public function getSettings(): Setting
    {
        return $this->settings;
    }

    /**
     * @return ReceiptSetting
     */
    public function getReceiptSettings(): ReceiptSetting
    {
        return $this->receiptSettings;
    }
}
