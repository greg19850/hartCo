<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\MenusController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CmsHomeController;
use App\Http\Controllers\CmsMenusController;
use App\Http\Controllers\CmsFaqController;
use App\Http\Controllers\CmsEventController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\CmsSettingsController;


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

        Route::match(['get', 'post'], 'login', [AdminAuthController::class, 'login'])->name('cms.login');
        Route::group(['middleware' => 'admin'], function () {

            //  Logout / Admin settings
            Route::get('logout', [AdminAuthController::class, 'logout'])->name('cms.logout');
            Route::post('update_password', [AdminAuthController::class, 'updatePassword'])->name('cms.updatePassword');

            //  Home/Meet the family
            Route::get('home', [CmsHomeController::class, 'showCmsHome'])->name('cms.showCmsHome');
            Route::post('home/post_motto', [CmsHomeController::class, 'updateMotto'])->name('cms.updateMotto');
            Route::post('home/post_description', [CmsHomeController::class, 'updateDescription'])->name('cms.updateDescription');

            // CMS FAQ
            Route::get('/faq', [CmsFaqController::class, 'showFaqPanel'])->name('cms.showFaqPanel');
            Route::post('/add_question', [CmsFaqController::class, 'addQuestion'])->name('cms.addQuestion');
            Route::post('/edit_question/{questionId}', [CmsFaqController::class, 'editQuestion'])->name('cms.editQuestion');
            Route::delete('/delete_question/{questionId}', [CmsFaqController::class, 'deleteQuestion'])->name('cms.deleteQuestion');

            // CMS Events
            Route::get('/events', [CmsEventController::class, 'showEventsPanel'])->name('cms.showEventsPanel');
            Route::post('/events/add_event', [CmsEventController::class, 'addEvent'])->name('cms.addEvent');
            Route::delete('/events/delete_event/{eventId}', [CmsEventController::class, 'deleteEvent'])->name('cms.deleteEvent');

            // CMS Menus
            Route::prefix("/menus")->group(
                function () {
                    Route::get('/', [CmsMenusController::class, 'showMenusPanel'])->name('cms.showMenusPanel');
                    Route::post('/create_menu', [CmsMenusController::class, 'createNewMenu'])->name('cms.createNewMenu');
                    Route::delete('/delete_menu/{menuId}', [CmsMenusController::class, 'deleteMenu'])->name('cms.deleteMenu');
                    Route::post('/update_rules', [CmsMenusController::class, 'updateRules'])->name('cms.updateRules');

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
                            Route::post('/update_menu_category/{subMenuId}', [CmsMenusController::class, 'updateSubMenu'])->name('cms.updateSubMenu');
                            Route::delete('/delete_menu_category/{subMenuId}', [CmsMenusController::class, 'deleteMenuCategory'])->name('cms.deleteMenuCategory');

                            Route::get('/sub_menu/add_menu_items_form/{subMenuId}', [CmsMenusController::class, 'addMenuItemsForm'])->name('cms.addMenuItemsForm');
                            Route::post('/sub_menu/add_menu_items/{subMenuId}', [CmsMenusController::class, 'addMenuItems'])->name('cms.addMenuItems');

                            Route::post('/sub_menu/update_menu_items/{subMenuId}', [CmsMenusController::class, 'updateMenuItems'])->name('cms.updateMenuItems');
                            Route::delete('/sub_menu/reset_menu_items/{subMenuId}', [CmsMenusController::class, 'resetMenuItems'])->name('cms.resetMenuItems');
                        }
                    );
                }
            );

            //  Settings
            Route::get('/settings', [CmsSettingsController::class, 'showSettingsPanel'])->name('cms.showSettingsPanel');
        });
    }
);


