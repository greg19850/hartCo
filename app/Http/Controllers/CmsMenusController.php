<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CmsMenusController extends Controller
{
    public function showCmsBreakfastMenuPanel()
    {
        return view('cms.menus.cmsBreakfastMenu');
    }

    public function showCmsMainMenuPanel()
    {
        return view('cms.menus.cmsMainMenu');
    }

    public function showCmsBrunchMenuPanel()
    {
        return view('cms.menus.cmsBrunchMenu');
    }

    public function showCmsSetMenuPanel()
    {
        return view('cms.menus.cmsSetMenu');
    }

    public function showCmsSnackMenuPanel()
    {
        return view('cms.menus.cmsSnackMenu');
    }

    public function showCmsDrinksMenuPanel()
    {
        return view('cms.menus.cmsDrinksMenu');
    }
}
