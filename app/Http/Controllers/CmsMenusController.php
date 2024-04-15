<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMenuRequest;
use App\Models\Menu;
use Illuminate\Http\Request;

class CmsMenusController extends Controller
{
    public function showMenusPanel()
    {

        $menus = Menu::all();

        return view('cms.menus.cmsMenusPanel', [
            'menus' => $menus
        ]);
    }

    public function createNewMenu(CreateMenuRequest $request)
    {
        dd($request->input('menu_name'));

        Menu::create([
            'name' => $request->input('menu_name')
        ]);

        return redirect()->route("cms.showMenusPanel")->with('message', 'New menu added');
    }
}
