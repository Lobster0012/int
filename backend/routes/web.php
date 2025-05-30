<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BuyRequestController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\CheckEventController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
<<<<<<< HEAD
use App\Http\Controllers\AchievementController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\CheckAchievementsController;
=======
>>>>>>> 6814b3d603f080bbd1f12b75d762da234cd501cc

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[ProductController::class,'index']);
Route::post('/product/buy/{product}',[BuyRequestController::class,'buy'])->name('buyRequest.buy');
Route::get('/buy/index',[BuyRequestController::class,'index'])->name('buyRequest.index');
Route::get('/buy/show/{id}',[BuyRequestController::class,'show'])->name('buyRequest.show');
Route::post('/buy/create/{id}',[BuyRequestController::class,'create'])->name('buyRequest.create');
Route::get('/user/show',[UserController::class,'show'])->name('user.show');
Route::get('/user/index',[UserController::class,'index'])->name('user.index');
Route::get('/events/create',[EventsController::class,'create'])->name('events.create');
Route::post('/events/store',[EventsController::class,'store'])->name('events.store');
Route::get('/events/index',[EventsController::class,'index'])->name('events.index');
Route::post('/member/store/{events}',[MemberController::class,'store'])->name('member.store');
Route::get('/products/create',[ProductController::class,'create'])->name('product.create');
Route::post('/products/store',[ProductController::class,'store'])->name('product.store');
Route::post('/checkEvent/statusOff/{item}',[CheckEventController::class,'statusOff'])->name('checkEvent.statusOff');
Route::post('/checkEvent/statusOffNot/{item}',[CheckEventController::class,'statusOffNot'])->name('checkEvent.statusOffNot');
Route::get('/admin/index',[AdminController::class,'index'])->name('admin.index');
Route::delete('/products/destroy/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/update/{id}', [ProductController::class, 'update'])->name('products.update');
Route::get('/admin/products',[AdminController::class,'products'])->name('admin.products');
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart/index', [CartController::class, 'index'])->name('cart.index');
Route::delete('/cart/destroy/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::put('/user/updateCoins/{id}', [UserController::class, 'updateCoins'])->name('user.updateCoins');
<<<<<<< HEAD
// Админка
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('achievements', AchievementController::class)->only([
        'index', 'create', 'store', 'edit', 'update', 'destroy'
    ]);
});
// Страница ачивок
Route::get('/achievements', function () {
    $achievements = \App\Models\Achievement::all();
    $user = auth()->user(); // или получить пользователя как-то иначе
    return view('achievements.index', compact('achievements', 'user'));
});
=======
Route::get('/user/all/{id}',[UserController::class,'all'])->name('user.all');

>>>>>>> 6814b3d603f080bbd1f12b75d762da234cd501cc
