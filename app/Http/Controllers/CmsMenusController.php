<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Support\Facades\Storage;

// Request
use Illuminate\Http\Request;
use App\Http\Requests\CreateMenuRequest;
use App\Http\Requests\EditMenuDetailsRequest;
use App\Http\Requests\EditMenuImageRequest;
use App\Http\Requests\MenuRuleRequest;
use App\Models\MenuRule;

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

        // foreach ($rules as $rule) {
        //     $ruleTxt = json_decode($rule->body);
        //     dump($ruleTxt);
        // }
        // die;
        return view('cms.menus.cmsEditMenu', [
            'menu' => $menu,
            'rules' => $rules
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

        MenuRule::create([
            'body' => $request->input('rule_data'),
            'menu_id' => $menuId
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

        return redirect()->route('cms.editMenu', $menuId)->with('success', 'Rules Removed');
    }
}
