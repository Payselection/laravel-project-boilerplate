<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Carbon;

/**
 * App\Models\Example
 *
 * @mixin \Eloquent
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Example newModelQuery()
 * @method static Builder|Example newQuery()
 * @method static Builder|Example query()
 * @method static Builder|Example whereCreatedAt($value)
 * @method static Builder|Example whereId($value)
 * @method static Builder|Example whereUpdatedAt($value)
 */
class Example extends SettingableModel
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
