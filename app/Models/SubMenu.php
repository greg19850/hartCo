<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubMenu extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function menuItem(): HasMany
    {
        return $this->hasMany(MenuItem::class);
    }

    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }
}
