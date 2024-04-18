<?php

namespace App\Http\Controllers;

use App\Models\FamilyDescription;
use App\Models\Menu;
use App\Models\Motto;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function homePage()
    {
        if (!$motto = Motto::first()) {
            $text = 'Your Local Girl Gang';
        } else {
            $text = $motto->motto;
        }

        if (!$familyDescription = FamilyDescription::first()) {
            $description = 'Description Coming Soon';
        } else {
            $description = $familyDescription->description;
        }

        return view('home.homePage', [
            'motto' => $text,
            'famDescription' => $description
        ]);
    }
}
