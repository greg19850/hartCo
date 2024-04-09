<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function subMenu(): HasMany
    {
        return $this->hasMany(SubMenu::class);
    }

    public function disclaimer(): HasMany
    {
        return $this->hasMany(Disclaimer::class);
    }

    public function menuRule(): HasMany
    {
        return $this->hasMany(MenuRule::class);
    }
}
