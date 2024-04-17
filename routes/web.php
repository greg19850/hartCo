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
        //        Route::get('breakfast_menu', [CmsMenusController::class, 'showCmsBreakfastMenuPanel'])->name('showCmsBreakfastMenuPanel');
        //        Route::get('main_menu', [CmsMenusController::class, 'showCmsMainMenuPanel'])->name('showCmsMainMenuPanel');
        //        Route::get('brunch_menu', [CmsMenusController::class, 'showCmsBrunchMenuPanel'])->name('showCmsBrunchMenuPanel');
        //        Route::get('set_menu', [CmsMenusController::class, 'showCmsSetMenuPanel'])->name('showCmsSetMenuPanel');
        //        Route::get('snack_menu', [CmsMenusController::class, 'showCmsSnackMenuPanel'])->name('showCmsSnackMenuPanel');
        //        Route::get('drinks_menu', [CmsMenusController::class, 'showCmsDrinksMenuPanel'])->name('showCmsDrinksMenuPanel');
    }
);
