<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Support\Facades\Storage;

// Request
use Illuminate\Http\Request;
use App\Http\Requests\CreateMenuRequest;
use App\Http\Requests\EditMenuDetailsRequest;
use App\Http\Requests\EditMenuImageRequest;
use App\Http\Requests\MenuCategoryRequest;
use App\Http\Requests\MenuRuleRequest;
use App\Http\Requests\SubMenuRequest;
use App\Models\MenuRule;
use App\Models\SubMenu;

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

        $rules = MenuRule::where('menu_id', $menuId)->get();
        $subMenus = SubMenu::where('menu_id', $menuId)->with('menuItem')->get();

        return view('cms.menus.cmsEditMenu', [
            'menu' => $menu,
            'rules' => $rules,
            'sub_menus' => $subMenus
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
        $menuToUpdate->serving_time = $request->input('edit_menu_serving_times');

        $menuToUpdate->save();

        return redirect()->back()->with('success', 'Menu details updated');
    }

    public function addMenuRulesForm(int $menuId)
    {

        if (!$menu = Menu::where('id', $menuId)->first()) {
            return redirect()->back()->withError("Sorry, menu not found");
        };

        return view('cms.menus.addMenuRule', [
            'menu' => $menu
        ]);
    }

    public function addMenuRules(MenuRuleRequest $request, int $menuId)
    {

        $rules = MenuRule::where('menu_id', $menuId)->get();


        MenuRule::create([
            'body' => $request->input('rule_data'),
            'menu_id' => $menuId,
            'position' => count($rules) + 1
        ]);

        return redirect()->route('cms.editMenu', $menuId)->with('success', 'Rules Added');
    }

    public function editMenuRulesForm(int $menuId, int $ruleId)
    {

        if (!$rule = MenuRule::where('id', $ruleId)->first()) {
            return redirect()->back()->withError("Sorry, menu rules not found");
        };

        return view('cms.menus.editMenuRule', [
            'rule' => $rule,
            'menuId' => $menuId,
        ]);
    }

    public function updateMenuRules(MenuRuleRequest $request, int $menuId, int $ruleId)
    {

        if (!$ruleToUpdate = MenuRule::where('id', $ruleId)->first()) {
            return redirect()->back()->withError("Sorry, menu rules not found");
        };

        $ruleToUpdate->body = $request->input('rule_data');
        $ruleToUpdate->save();

        return redirect()->route('cms.editMenu', $menuId)->with('success', 'Rules Updated');
    }

    public function deleteMenuRules(int $menuId, int $ruleId)
    {

        if (!$ruleToDelete = MenuRule::where('id', $ruleId)->first()) {
            return redirect()->back()->withError("Sorry, menu rules not found");
        };

        $ruleToDelete->delete();

        $rules = MenuRule::where('menu_id', $menuId)->get();

        foreach ($rules as $index => $rule) {
            $rule->position = $index + 1;

            $rule->save();
        }

        return redirect()->route('cms.editMenu', $menuId)->with('success', 'Rules Removed');
    }

    public function addSubMenuForm(int $menuId)
    {
        if (!$menu = Menu::where('id', $menuId)->first()) {
            return redirect()->back()->withError("Sorry, menu not found");
        };

        return view('cms.menus.addSubMenu', [
            'menu' => $menu
        ]);
    }

    public function addSubMenu(SubMenuRequest $request, int $menuId)
    {
        $subMenu = new SubMenu();

        $subMenu->menu_id = $menuId;
        $subMenu->title = $request->input('name');
        $subMenu->price = $request->input('price');
        $subMenu->description = $request->input('description');

        if ($request->input('price') !== null && $request->input('pp_check') !== null) {
            $subMenu->per_person = true;
        } else {
            $subMenu->per_person = false;
        }

        $subMenu->save();

        return redirect()->route('cms.addMenuItemsForm', ['menuId' => $menuId, 'subMenuId' => $subMenu->id])->with('success', 'Sub Menu Created');
    }

    public function editMenuCategoryForm(int $menuId, int $subMenuId)
    {

        if (!$subMenuToUpdate = SubMenu::where('id', $subMenuId)->with('menuItem')->first()) {
            return redirect()->back()->withError("Sorry, sub menu not found");
        };

        return view('cms.menus.cmsEditMenuCategory', [
            'subMenu' => $subMenuToUpdate
        ]);
    }

    public function updateSubMenu(SubMenuRequest $request, int $menuId, int $subMenuId)
    {

        if (!$subMenuToUpdate = SubMenu::where('id', $subMenuId)->first()) {
            return redirect()->back()->withError("Sorry, sub menu not found");
        }

        $subMenuToUpdate = SubMenu::where('id', $subMenuId)->first();

        $subMenuToUpdate->title = $request->input('name');
        $subMenuToUpdate->description = $request->input('description');
        $subMenuToUpdate->price = $request->input('price');

        if ($request->input('price') !== null && $request->input('pp_check') !== null) {
            $subMenuToUpdate->per_person = true;
        } else {
            $subMenuToUpdate->per_person = false;
        }

        $subMenuToUpdate->save();

        return redirect()->back()->withSuccess('Sub menu details updated');
    }

    public function deleteMenuCategory(int $menuId, int $subMenuId)
    {

        if (!$categoryToDelete = SubMenu::where('id', $subMenuId)->first()) {
            return redirect()->back()->withError("Sorry, sub menu not found");
        };

        $categoryToDelete->delete();

        // $rules = SubMenu::where('menu_id', $menuId)->get();

        // foreach ($rules as $index => $rule) {
        //     $rule->position = $index + 1;

        //     $rule->save();
        // }

        return redirect()->route('cms.editMenu', $menuId)->with('success', 'Menu Category Removed');
    }

    public function addMenuItemsForm(int $menuId, int $subMenuId)
    {

        if (!$menu = Menu::where('id', $menuId)->first()) {
            return redirect()->back()->withError("Sorry, menu not found");
        };

        if (!$subMenu = SubMenu::where('id', $subMenuId)->first()) {
            return redirect()->back()->withError("Sorry, menu category not found");
        };

        return view('cms.menus.addMenuItems', [
            'menu' => $menu,
            'subMenu' => $subMenu
        ]);
    }


    public function addMenuItems(Request $request, int $menuId, int $subMenuId)
    {
        $menuItems = [];

        foreach ($request->input('name') as $index => $name) {
            $menuItems[] = [
                'name' => $name,
                'description' => $request->input('description')[$index],
                'price' => $request->input('price')[$index],
                'is_vegan' => $request->input('is_vegan')[$index],
            ];
        }

        foreach ($menuItems as $menuItem) {
            MenuItem::create([
                'name' => $menuItem['name'],
                'ingredients' => $menuItem['description'],
                'price' => $menuItem['price'],
                'vegan' => $menuItem['is_vegan'],
                'sub_menu_id' => $subMenuId,
            ]);
        }

        return redirect()->route('cms.editMenu', $menuId)->with('success', 'Menu Items added successfully to menu');
    }


    public function updateMenuItems(Request $request, int $menuId, int $subMenuId)
    {

        try{
            MenuItem::where('sub_menu_id', $subMenuId)->delete();

            $menuItems = [];

            foreach ($request->input('name') as $index => $name) {
                $menuItems[] = [
                    'name' => $name,
                    'description' => $request->input('description')[$index],
                    'price' => $request->input('price')[$index],
                    'is_vegan' => $request->input('is_vegan')[$index],
                ];
            }

            foreach ($menuItems as $menuItem) {
                MenuItem::create([
                    'name' => $menuItem['name'],
                    'ingredients' => $menuItem['description'],
                    'price' => $menuItem['price'],
                    'vegan' => $menuItem['is_vegan'],
                    'sub_menu_id' => $subMenuId,
                ]);
            }

            return redirect()->back()->withSuccess('Menu Items list updated successfully');
        } catch(Exception $e){
            return redirect()->back()->withError($e->getMessage());
        }

    }

    public function resetMenuItems(Request $request, int $menuId, int $subMenuId)
    {
            MenuItem::where('sub_menu_id', $subMenuId)->delete();

            return redirect()->back()->withSuccess('Menu Items list cleared successfully');
    }
}
