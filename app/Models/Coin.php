<?php

namespace App\Models;

use App\Enums\CoinType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Coin extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'date' => 'date',
        'type' => CoinType::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function rois(): HasMany {
        return $this->hasMany(ReturnOnInvestment::class);
    }

    public function scopeType($query, $type) {
        return $query->where('type', $type);
    }
}
