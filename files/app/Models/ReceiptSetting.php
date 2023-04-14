<?php

namespace App\Models;

use App\Enum\ReceiptSettings as Enum;
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
 * @property Enum\Sno $sno
 * @property Enum\Vat $vat
 * @property Enum\ItemType $item_type
 * @property Enum\PaymentType $payment_type
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
        'sno' => Enum\Sno::class,
        'vat' => Enum\Vat::class,
        'item_type' => Enum\ItemType::class,
        'payment_type' => Enum\PaymentType::class,
    ];

    protected $attributes = [
        'sno' => Enum\Sno::osn,
        'vat' => Enum\Vat::none,
        'item_type' => Enum\ItemType::another,
        'payment_type' => Enum\PaymentType::full_payment,
    ];

    /**
     * @return BelongsTo
     */
    public function settings(): BelongsTo
    {
        return $this->belongsTo(Setting::class);
    }

    /**
     * @return Enum\Sno[]
     */
    public function snoEnum(): array
    {
        return Enum\Sno::cases();
    }

    /**
     * @return Enum\Vat[]
     */
    public function vatEnum(): array
    {
        return Enum\Vat::cases();
    }

    /**
     * @return Enum\ItemType[]
     */
    public function itemTypeEnum(): array
    {
        return Enum\ItemType::cases();
    }

    /**
     * @return Enum\PaymentType[]
     */
    public function paymentTypeEnum(): array
    {
        return Enum\PaymentType::cases();
    }

    /**
     * @return Enum\Attributes[]
     */
    public function attributesEnum(): array
    {
        return Enum\Attributes::cases();
    }
}
