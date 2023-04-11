<?php

namespace App\Models;

use App\Enums\Settings as Enums;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Setting
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $site_id
 * @property string $public_key
 * @property string $secret_key
 * @property bool $receipt
 * @property int $settingable_id
 * @property string $settingable_type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Setting newModelQuery()
 * @method static Builder|Setting newQuery()
 * @method static Builder|Setting query()
 * @method static Builder|Setting whereCreatedAt($value)
 * @method static Builder|Setting whereUpdatedAt($value)
 */
class Setting extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'receipt' => 'boolean',
    ];

    /**
     * @return MorphTo
     */
    public function settingable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * @return HasOne
     */
    public function receiptSettings(): HasOne
    {
        return $this->hasOne(ReceiptSetting::class);
    }

    public static function boot()
    {
        parent::boot();
        self::deleting(function (self $settings) {
            $settings->receiptSettings()->each(function ($receiptSettings) {
                $receiptSettings->delete();
            });
        });
    }

    /**
     * @return Enums\Attributes[]
     */
    public function attributesEnum(): array
    {
        return Enums\Attributes::cases();
    }
}
