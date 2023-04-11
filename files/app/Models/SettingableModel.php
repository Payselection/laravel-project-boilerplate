<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * App\Models\SettingableModel
 */
abstract class SettingableModel extends Model
{
    /**
     * @return MorphOne
     */
    abstract public function settings(): MorphOne;
}
