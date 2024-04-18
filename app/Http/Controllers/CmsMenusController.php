<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMenuRequest;
use App\Http\Requests\EditMenuDetailsRequest;
use App\Http\Requests\EditMenuImageRequest;
use App\Models\Menu;
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
            'slug' => $request->input('menu_slug'),
            'image' => $imgUrl,
        ]);

        return redirect()->route("cms.showMenusPanel")->with('success', 'New menu added successfully');
    }

    public function deleteMenu(int $menuId)
    {
        if (!$menuToDelete = Menu::where('id', $menuId)->first()) {
            return redirect()->back()->withError("Sorry, menu not found");
        }

        $menuImg = basename($menuToDelete->image);

        if (Storage::disk('public')->exists($menuImg)) {
            Storage::disk('public')->delete($menuImg);
        }

        $menuToDelete->delete();

        return redirect()->back()->with('success', 'Menu removed');
    }

    public function editMenu(int $menuId)
    {
        if (!$menu = Menu::where('id', $menuId)->first()) {
            return redirect()->back()->withError("Sorry, menu not found");
        }

        return view('cms.menus.cmsEditMenu', [
            'menu' => $menu
        ]);
    }

    public function updateMenuImg(EditMenuImageRequest $request, int $menuId)
    {
        if (!$menuToUpdate = Menu::where('id', $menuId)->first()) {
            return redirect()->back()->withError("Sorry, menu not found");
        }

        $currentImg = basename($menuToUpdate->image);

        if (Storage::disk('public')->exists($currentImg)) {
            Storage::disk('public')->delete($currentImg);
        }

        $hasFile = $request->hasFile('menu_img_edit');

        if ($hasFile) {
            $imgFile = $request->file('menu_img_edit');

            $link = Storage::putFile('public', $imgFile);

            $imgUrl = Storage::url($link);
        } else {
            $imgUrl = "/images/menu_default.jpg";
        }

        $menuToUpdate->image = $imgUrl;

        $menuToUpdate->save();

        return redirect()->back()->with('success', 'Menu Image updated');
    }

    public function updateMenuDetails(EditMenuDetailsRequest $request, int $menuId)
    {
        if (!$menuToUpdate = Menu::where('id', $menuId)->first()) {
            return redirect()->back()->withError("Sorry, menu not found");
        }

        $menuToUpdate->name = $request->input('edit_menu_name');
        $menuToUpdate->slug = $request->input('edit_menu_slug');
        $menuToUpdate->serving_time = $request->input('edit_menu_serving_times');

        $menuToUpdate->save();

        return redirect()->back()->with('success', 'Menu details updated');
    }
}
