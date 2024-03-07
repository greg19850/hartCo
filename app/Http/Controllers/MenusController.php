<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenusController extends Controller
{
    public function showBreakfastMenu()
    {
        return view('menus.breakfastMenu');
    }

    public function showMainMenu()
    {
        return view('menus.mainMenu');
    }
    public function showBrunchMenu()
    {
        return view('menus.brunchMenu');
    }

    public function showSetMenu()
    {
        return view('menus.setMenu');
    }

    public function showSnackMenu()
    {
        return view('menus.snackMenu');
    }

    public function showDrinksMenu()
    {
        return view('menus.drinksMenu');
    }
}
