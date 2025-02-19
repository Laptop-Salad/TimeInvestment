<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Goal extends Model
{
    protected $guarded = ['id'];

    public function investments(): HasMany {
        return $this->hasMany(Investment::class);
    }
}
