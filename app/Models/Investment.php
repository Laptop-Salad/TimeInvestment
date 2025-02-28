<?php

namespace App\Models;

use App\Enums\InvestmentType;
use App\Enums\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Investment extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'date' => 'date',
        'type' => InvestmentType::class,
        'status' => Status::class,
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
