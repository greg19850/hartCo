<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenusController extends Controller
{
    public function showMenu($menuId)
    {
        $menu = Menu::where('id', $menuId)->with(['subMenu.menuItem'])->with('menuRule')->firstOrFail();

        return view('menus.singleMenu', ['menu' => $menu]);
    }
}
