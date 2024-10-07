<?php

namespace App\Http\Controllers;

use App\Models\ContactInfo;
use App\Models\Event;
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

        $menus = Menu::all();
        $contactInfo = ContactInfo::first();
        $events = Event::all();

        return view('home.homePage', [
            'motto' => $text,
            'famDescription' => $description,
            'menus' => $menus,
            'contactInfo' => $contactInfo,
            'events' => $events,
        ]);
    }
}
