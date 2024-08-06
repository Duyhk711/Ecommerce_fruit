<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admins\UserController;
use App\Http\Controllers\Clients\ShopController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admins\DanhMucController;
use App\Http\Controllers\Admins\DonHangController;

use App\Http\Controllers\Admins\SanPhamController;
use App\Http\Controllers\Admins\SlidersController;
// use App\Http\Controllers\Admins\SlidersController;

// use App\Http\Controllers\Clients\ShowSlideController;
use App\Http\Controllers\Clients\ShowSliderController;


use App\Http\Controllers\BinhLuanController;


use App\Http\Controllers\Clients\CartController;
use App\Http\Controllers\OrderController;
use App\Models\User;


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


// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/dashboard', function () {
//     return view('admins.index');
// });



Route::middleware(['auth', 'auth.admin'])->prefix('admins')
->as('admins.')
->group(function(){

        Route::get('/dashboard', [HomeController::class, 'index'])
        ->name('dashboard');

        Route::prefix('danhmucs')
        ->as('danhmucs.')
        ->group(function(){
            Route::get('/',                 [DanhMucController::class , 'index'])->name('index');
            Route::get('/create',           [DanhMucController::class , 'create'])->name('create');
            Route::post('/store',           [DanhMucController::class , 'store'])->name('store');
            Route::get('/show/{id}',        [DanhMucController::class , 'show'])->name('show');
            Route::get('{id}/edit',         [DanhMucController::class , 'edit'])->name('edit');
            Route::put('{id}/update',       [DanhMucController::class , 'update'])->name('update');
            Route::delete('{id}/destroy',   [DanhMucController::class , 'destroy'])->name('destroy');
        });
        Route::get('/',                         [SlidersController::class , 'index'])->name('index');
        Route::get('/create',                   [SlidersController::class , 'create'])->name('create');
        Route::post('/store',                   [SlidersController::class , 'store'])->name('store');
        Route::put('{id}/update',               [SlidersController::class , 'update'])->name('update');
        Route::get('{id}/edit',                 [SlidersController::class , 'edit'])->name('edit');
        Route::delete('{id}/destroy',           [SlidersController::class , 'destroy'])->name('destroy');

        Route::prefix('sanphams')
        ->as('sanphams.')
        ->group(function(){
            Route::get('/',                 [SanPhamController::class , 'index'])->name('index');
            Route::get('/create',           [SanPhamController::class , 'create'])->name('create');
            Route::post('/store',           [SanPhamController::class , 'store'])->name('store');
            Route::get('/show/{id}',        [SanPhamController::class , 'show'])->name('show');
            Route::get('{id}/edit',         [SanPhamController::class , 'edit'])->name('edit');
            Route::put('{id}/update',       [SanPhamController::class , 'update'])->name('update');
            Route::delete('{id}/destroy',   [SanPhamController::class , 'destroy'])->name('destroy');
        });


        Route::prefix('donhangs')
        ->as('donhangs.')
        ->group(function(){
            Route::get('/',                 [DonHangController::class , 'index'])->name('index');
            Route::get('/show/{id}',        [DonHangController::class , 'show'])->name('show');
            Route::put('{id}/update',       [DonHangController::class , 'update'])->name('update');
            Route::delete('{id}/destroy',   [DonHangController::class , 'destroy'])->name('destroy');
        });

        Route::prefix('taikhoans')
        ->as('taikhoans.')
        ->group(function(){
            Route::get('/', [UserController::class , 'index'])->name('index');
            Route::get('/profile', [UserController::class , 'showProfile'])->name('profile');
            Route::get('/show/{id}', [UserController::class , 'show'])->name('show');
        });
});


Route::get('/login',      [AuthController::class, 'showFormLogin']);
Route::post('/login',     [AuthController::class, 'login'])->name('login');
Route::get('/register',   [AuthController::class, 'showFormRegister']);
Route::post('/register',  [AuthController::class, 'register'])->name('register');
Route::post('/logout',    [AuthController::class, 'logout'])->name('logout');
Route::post('/update-role', [UserController::class, 'updateRole'])->name('updateRole');


Route::prefix('clients')
->as('clients.')
->group(function(){
    
    Route::middleware('auth')->group(function(){
        Route::get('/list-cart',         [CartController::class,   'listCart'])->name('cart.list');
        Route::post('/add-to-cart',      [CartController::class,   'addCart'])->name('cart.add');
        Route::post('/update-cart',      [CartController::class,   'updateCart'])->name('cart.update');
    });
    // Route::get('/home',              [ClientController::class, 'index'])->name('trang_chu');
    Route::get('/product/{cat}',     [ClientController::class, 'danhMuc'])->name('product');
    Route::get('/shop',              [ShopController::class,   'shop'])->name('shop');
    
    
    Route::get('/detailProduct/{id}',[ShopController::class,   'detailProduct'])->name('detailProduct');
    
    Route::middleware('auth')->prefix('donhangs')
    ->as('donhangs.')
    ->group(function(){
        Route::get('/',                 [OrderController::class , 'index'])->name('index');
        Route::get('/create',           [OrderController::class , 'create'])->name('create');
        Route::post('/store',           [OrderController::class , 'store'])->name('store');
        Route::get('/show/{id}',        [OrderController::class , 'show'])->name('show');
        Route::put('{id}/update',       [OrderController::class , 'update'])->name('update');

    });

    
});
Route::post('/products/{id}/comments', [BinhLuanController::class, 'store'])->middleware('auth')->name('comments.store');

Route::get('/', [ClientController::class, 'index'])->name('trang_chu');







