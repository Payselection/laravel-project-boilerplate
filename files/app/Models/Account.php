<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Carbon;

/**
 * App\Models\Account
 *
 * @mixin \Eloquent
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Account newModelQuery()
 * @method static Builder|Account newQuery()
 * @method static Builder|Account query()
 * @method static Builder|Account whereCreatedAt($value)
 * @method static Builder|Account whereId($value)
 * @method static Builder|Account whereUpdatedAt($value)
 */
class Account extends SettingableModel
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * @return MorphOne
     */
    public function settings(): MorphOne
    {
        return $this->morphOne(Setting::class, 'settingable');
    }
}
