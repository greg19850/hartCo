<?php

namespace App\Rules;

use App\Models\Menu;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class MenuImageExists implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!Menu::where('menu_image', $value)->exists()) { $fail('The menu image is required if it does not already exist.'); }
    }
}
