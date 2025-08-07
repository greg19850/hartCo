<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class EventBanner extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'event_date' => 'date',
        'is_active' => 'boolean',
    ];

    public function scopeUpcoming($query)
    {
        return $query->where('event_date', '>=', Carbon::today())
                    ->where('is_active', true)
                    ->orderBy('event_date', 'asc');
    }
}
