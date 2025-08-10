<?php

namespace App\Http\Controllers;

use App\Models\ContactInfo;
use App\Models\Event;
use App\Models\EventBanner;
use App\Models\FamilyDescription;
use App\Models\Faq;
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
        $upcomingBanner = EventBanner::upcoming()->first();
        $menus = Menu::all();
        $contactInfo = ContactInfo::first();
        $events = Event::orderByRaw("STR_TO_DATE(date, '%d/%m/%Y')")->get();
        $faqs = Faq::all();

        return view('pages.homePage', [
            'motto' => $text,
            'famDescription' => $description,
            'menus' => $menus,
            'contactInfo' => $contactInfo,
            'events' => $events,
            'faqs' => $faqs,
            'upcomingBanner' => $upcomingBanner
        ]);
    }

    public function kidsPage(){
        return view('pages.kids-page');
    }

    public function mobileVanPage(){
        return view('pages.mobile-van-page');
    }

    public function christmasPage(){
        return view('pages.christmas-page');
    }
}
