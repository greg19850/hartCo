<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\MenusController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CmsController;
use App\Http\Controllers\CmsMenusController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PageController::class, 'homePage'])->name('homepage');

Route::prefix("/menus")->group(
    function () {
        Route::get('breakfast_menu', [MenusController::class, 'showBreakfastMenu'])->name('showBreakfastMenu');
        Route::get('main_menu', [MenusController::class, 'showMainMenu'])->name('showMainMenu');
        Route::get('brunch_menu', [MenusController::class, 'showBrunchMenu'])->name('showBrunchMenu');
        Route::get('set_menu', [MenusController::class, 'showSetMenu'])->name('showSetMenu');
        Route::get('snack_menu', [MenusController::class, 'showSnackMenu'])->name('showSnackMenu');
        Route::get('drinks_menu', [MenusController::class, 'showDrinksMenu'])->name('showDrinksMenu');
    }
);

Route::prefix("/cms")->group(
    function () {
        Route::get('home', [CmsController::class, 'showCmsHome'])->name('cms.showCmsHome');
        Route::post('home/post_motto', [CmsController::class, 'updateMotto'])->name('cms.updateMotto');
        Route::post('home/post_description', [CmsController::class, 'updateDescription'])->name('cms.updateDescription');
    }
);

Route::prefix("/cms/menus")->group(
    function () {
        Route::get('/', [CmsMenusController::class, 'showMenusPanel'])->name('cms.showMenusPanel');
        Route::post('/create_menu', [CmsMenusController::class, 'createNewMenu'])->name('cms.createNewMenu');
        Route::delete('/delete_menu/{menuId}', [CmsMenusController::class, 'deleteMenu'])->name('cms.deleteMenu');
        Route::post('/update_rules', [CmsMenusController::class, 'updateRules'])->name('cms.updateRules');
    }
);

// Single menu

Route::prefix('/cms/menus/edit_menu/{menuId}')->group(
    function () {
        Route::get('/', [CmsMenusController::class, 'editMenu'])->name('cms.editMenu');
        Route::post('/update_img', [CmsMenusController::class, 'updateMenuImg'])->name('cms.updateMenuImg');
        Route::post('/update_menu_details', [CmsMenusController::class, 'updateMenuDetails'])->name('cms.updateMenuDetails');

        Route::get('/add_menu_rules_form', [CmsMenusController::class, 'addMenuRulesForm'])->name('cms.addMenuRulesForm');
        Route::post('/add_menu_rules', [CmsMenusController::class, 'addMenuRules'])->name('cms.addMenuRules');

        Route::get('/edit_menu_rules_form/rule/{ruleId}', [CmsMenusController::class, 'editMenuRulesForm'])->name('cms.editMenuRulesForm');
        Route::post('/update_menu_rules/{ruleId}', [CmsMenusController::class, 'updateMenuRules'])->name('cms.updateMenuRules');
        Route::delete('/delete_menu_rules/{ruleId}', [CmsMenusController::class, 'deleteMenuRules'])->name('cms.deleteMenuRules');

        Route::get('/add_submenu_form', [CmsMenusController::class, 'addSubMenuForm'])->name('cms.addSubMenuForm');
        Route::post('/add_sub_menu', [CmsMenusController::class, 'addSubMenu'])->name('cms.addSubMenu');

        Route::get('/edit_menu_category/{subMenuId}', [CmsMenusController::class, 'editMenuCategoryForm'])->name('cms.editMenuCategoryForm');
        Route::post('/update_menu_category/{subMenuId}', [CmsMenusController::class, 'updateMenuCategory'])->name('cms.updateMenuCategory');
        Route::delete('/delete_menu_category/{subMenuId}', [CmsMenusController::class, 'deleteMenuCategory'])->name('cms.deleteMenuCategory');

        Route::get('/sub_menu/add_menu_items_form/{subMenuId}', [CmsMenusController::class, 'addMenuItemsForm'])->name('cms.addMenuItemsForm');
        Route::post('/sub_menu/add_menu_items/{subMenuId}', [CmsMenusController::class, 'addMenuItems'])->name('cms.addMenuItems');
    }
);
