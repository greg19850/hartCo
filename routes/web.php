<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\MenusController;
use App\Http\Controllers\PageController;
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
