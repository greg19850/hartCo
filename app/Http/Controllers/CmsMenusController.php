<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMenuRequest;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $hasFile = $request->hasFile('menu_img');

        if ($hasFile) {
            $imgFile = $request->file('menu_img');

            $link = Storage::putFile('public', $imgFile);

            $imgUrl = Storage::url($link);
        } else {
            $imgUrl = "/images/menu_default.jpg";
        }

        Menu::create([
            'name' => $request->input('menu_name'),
            'image' => $imgUrl,
        ]);

        return redirect()->route("cms.showMenusPanel")->with('success', 'New menu added successfully');
    }
}
