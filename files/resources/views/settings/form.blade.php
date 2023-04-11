<form name="configure" method="POST" action="{{ $formActionUrl }}">
    <input type="hidden" name="action" value="save">

    @foreach ($formHiddenFields as $name => $value)
        <input type="hidden" name="{{ $name }}" value="{{ $value }}">
    @endforeach

    @php
        $receiptRequired = (bool)$settings->receipt;
    @endphp

    <div class="m-6 grid grid-cols-1 gap-6">

        @include('settings.input', [
            'title' => 'Идентификатор (SITE-ID)',
            'name' => 'settings[site_id]',
            'value' => $settings->site_id,
            'pattern' => '[0-9]{1,}$',
            'required' => true
        ])
        @include('settings.input', [
            'title' => 'Public key',
            'name' => 'settings[public_key]',
            'value' => $settings->public_key,
            'pattern' => '[0-9a-z]{1,}$',
            'required' => true
        ])
        @include('settings.input', [
            'title' => 'Секретный ключ',
            'name' => 'settings[secret_key]',
            'value' => $settings->secret_key,
            'pattern' => '[0-9A-Za-z]{1,}$',
            'required' => true
        ])
        @include('settings.checkbox', [
            'checked' => $receiptRequired,
            'title' => 'Отправка чеков. Чек выпускает Payselection',
            'name' => 'settings[receipt]',
            'id' => 'settings_receipt',
            'required' => false
        ])

    </div>

    <div id="receipt_settings" class="m-6 grid grid-cols-1 gap-6 {{ $receiptRequired ? '' : 'hidden' }} ">

        @include('settings.input', [
            'title' => 'ИНН организации',
            'name' => 'receiptSettings[inn]',
            'value' => $receiptSettings->inn,
            'pattern' => '[0-9]{10,12}$',
            'required' => $receiptRequired
        ])
        @include('settings.input', [
            'title' => 'Email организации',
            'name' => 'receiptSettings[email]',
            'value' => $receiptSettings->email,
            'type' => 'email', 
            'pattern' => '[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$',
            'required' => $receiptRequired
        ])
        @include('settings.input', [
            'title' => 'Юридический адрес',
            'name' => 'receiptSettings[address]',
            'value' => $receiptSettings->address,
            'required' => $receiptRequired
        ])

        @include('settings.select', [
            'title' => 'Система налогообложения',
            'name' => 'receiptSettings[sno]',
            'value' => $receiptSettings->sno->value,
            'options' => $receiptSettings->snoEnum(),
            'required' => $receiptRequired
        ])
        @include('settings.select', [
            'title' => 'Ставка НДС для всех позиций',
            'name' => 'receiptSettings[vat]',
            'value' => $receiptSettings->vat->value,
            'options' => $receiptSettings->vatEnum(),
            'required' => $receiptRequired
        ])
        @include('settings.select', [
            'title' => 'Тип оплачиваемой позиции',
            'name' => 'receiptSettings[item_type]',
            'value' => $receiptSettings->item_type->value,
            'options' => $receiptSettings->itemTypeEnum(),
            'required' => $receiptRequired
        ])
        @include('settings.select', [
            'title' => 'Тип оплаты',
            'name' => 'receiptSettings[payment_type]',
            'value' => $receiptSettings->payment_type->value,
            'options' => $receiptSettings->paymentTypeEnum(),
            'required' => $receiptRequired
        ])

    </div>

    <div class="px-4 py-3 text-right sm:px-6">
        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Сохранить
        </button>
    </div>
</form>

<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        var receipt = document.querySelector('#settings_receipt');
        var receiptSettings = document.querySelector('#receipt_settings');
        var receiptSettingsFields = receiptSettings.querySelectorAll('input, select');

        receipt.addEventListener('change', function(element) {
            if (receipt.checked) {
                receiptSettings.classList.remove("hidden");
                receiptSettingsFields.forEach((field) => {
                    field.setAttribute('required', '');
                });
            } else {
                receiptSettingsFields.forEach((field) => {
                    field.removeAttribute('required');
                });
                receiptSettings.classList.add("hidden");
            }
        });
    });
</script>
