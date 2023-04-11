<?php

namespace App\Models;

use App\Enums\ReceiptSettings as Enums;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\ReceiptSetting
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $setting_id
 * @property string $inn
 * @property string $email
 * @property string $address
 * @property Enums\Sno $sno
 * @property Enums\Vat $vat
 * @property Enums\ItemType $item_type
 * @property Enums\PaymentType $payment_type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|ReceiptSetting newModelQuery()
 * @method static Builder|ReceiptSetting newQuery()
 * @method static Builder|ReceiptSetting query()
 * @method static Builder|ReceiptSetting whereCreatedAt($value)
 * @method static Builder|ReceiptSetting whereUpdatedAt($value)
 */
class ReceiptSetting extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $casts = [
        'sno' => Enums\Sno::class,
        'vat' => Enums\Vat::class,
        'item_type' => Enums\ItemType::class,
        'payment_type' => Enums\PaymentType::class,
    ];

    protected $attributes = [
        'sno' => Enums\Sno::osn,
        'vat' => Enums\Vat::none,
        'item_type' => Enums\ItemType::award,
        'payment_type' => Enums\PaymentType::full_payment,
    ];

    /**
     * @return BelongsTo
     */
    public function settings(): BelongsTo
    {
        return $this->belongsTo(Setting::class);
    }

    /**
     * @return Enums\Sno[]
     */
    public function snoEnum(): array
    {
        return Enums\Sno::cases();
    }

    /**
     * @return Enums\Vat[]
     */
    public function vatEnum(): array
    {
        return Enums\Vat::cases();
    }

    /**
     * @return Enums\ItemType[]
     */
    public function itemTypeEnum(): array
    {
        return Enums\ItemType::cases();
    }

    /**
     * @return Enums\PaymentType[]
     */
    public function paymentTypeEnum(): array
    {
        return Enums\PaymentType::cases();
    }

    /**
     * @return Enums\Attributes[]
     */
    public function attributesEnum(): array
    {
        return Enums\Attributes::cases();
    }
}
