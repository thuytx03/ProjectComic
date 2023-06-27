<?php

use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\ChapterController;
use App\Http\Controllers\Admin\CoinController;
use App\Http\Controllers\Admin\ComicController;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\AuthClientController;
use App\Http\Controllers\Client\ChapterDetailController;
use App\Http\Controllers\Client\CoinClientController;
use App\Http\Controllers\Client\ComicDetailController;
use App\Http\Controllers\Client\FollowController;
use App\Http\Controllers\Client\IndexController;
use Illuminate\Support\Facades\Route;


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

Route::get('/', [IndexController::class, 'index'])->name('trang-chu');



Route::get('admin/login', [AuthController::class, 'index'])->name('login');
Route::post('admin/saveLogin', [AuthController::class, 'login'])->name('saveLogin');

Route::middleware('CheckAdmin')->group(function () {
    Route::prefix('/admin/')->group(function () {
        Route::get('home', [HomeController::class, 'index'])->name('admin.home');

        Route::prefix('genre')->group(function () {
            Route::get('/', [GenreController::class, 'index'])->name('list.genre');
            Route::get('/add', [GenreController::class, 'create'])->name('add.genre');
            Route::post('/saveAdd', [GenreController::class, 'store'])->name('saveAdd.genre');
            Route::delete('/destroy/{id}', [GenreController::class, 'destroy']);
            Route::get('/edit/{id}', [GenreController::class, 'edit']);
            Route::put('/update/{id}', [GenreController::class, 'update']);
        });

        Route::prefix('comic')->group(function () {
            Route::get('/', [ComicController::class, 'index'])->name('list.comic');
            Route::get('/add', [ComicController::class, 'create'])->name('add.comic');
            Route::post('/saveAdd', [ComicController::class, 'store'])->name('saveAdd.comic');
            Route::delete('/destroy/{id}', [ComicController::class, 'destroy']);
            Route::get('/edit/{id}', [ComicController::class, 'edit']);
            Route::put('/update/{id}', [ComicController::class, 'update']);
        });
        Route::prefix('chapter')->group(function () {
            Route::get('/', [ChapterController::class, 'index'])->name('list.chapter');
            Route::get('/add', [ChapterController::class, 'create'])->name('add.chapter');
            Route::post('/saveAdd', [ChapterController::class, 'store'])->name('saveAdd.chapter');
            Route::delete('/destroy/{id}', [ChapterController::class, 'destroy']);
            Route::get('/edit/{id}', [ChapterController::class, 'edit']);
            Route::put('/update/{id}', [ChapterController::class, 'update']);
        });
        Route::prefix('coins')->group(function () {
            Route::get('/', [CoinController::class, 'index'])->name('list.coins');
            Route::get('/add', [CoinController::class, 'create'])->name('add.coins');
            Route::post('/saveAdd', [CoinController::class, 'store'])->name('saveAdd.coins');
            Route::get('/confirm/{id}', [CoinController::class, 'confirm'])->name('confirm.coins');
            Route::get('/cancel/{id}', [CoinController::class, 'cancel'])->name('cancel.coins');
            Route::get('/show/{id}', [CoinController::class, 'show'])->name('show.coins');
        });
        Route::prefix('roles')->group(function () {
            Route::get('/', [RoleController::class, 'index'])->name('list.role');
            Route::get('/add', [RoleController::class, 'create'])->name('add.role');
            Route::post('/saveAdd', [RoleController::class, 'store'])->name('saveAdd.role');
            Route::delete('/destroy/{id}', [RoleController::class, 'destroy'])->name('destroy.role');
            Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('edit.role');
            Route::put('/update/{id}', [RoleController::class, 'update'])->name('update.role');
        });
        Route::prefix('users')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('list.user');
            Route::get('/add', [UserController::class, 'create'])->name('add.user');
            Route::post('/saveAdd', [UserController::class, 'store'])->name('saveAdd.user');
            Route::delete('/destroy/{id}', [UserController::class, 'destroy'])->name('destroy.user');
            Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit.user');
            Route::put('/update/{id}', [UserController::class, 'update'])->name('update.user');
        });
    });
});


Route::get('/comic/{slug}/{id}', [ComicDetailController::class, 'index'])->name('comicDetail');

Route::middleware('auth')->group(function () {
    Route::get('/thong-tin-ca-nhan', [AuthClientController::class, 'detailUser'])->name('thong-tin-ca-nhan');
    Route::prefix('/comic/')->group(function () {
        Route::get('chapter/{slug}/{id}/{chapter_id}', [ChapterDetailController::class, 'index'])->name('chapter.detail');
        Route::get('follows/',[FollowController::class,'index'])->name('follow.index');
        Route::post('/follows/{id}',[FollowController::class,'followComic'])->name('follow.comic');
        Route::delete('/follows/{comic_id}', [FollowController::class,'unfollowComic'])->name('follow.destroy');
    });
    Route::get('/coins',[CoinClientController::class, 'index'])->name('coins.index');
    Route::post('/saveCoins',[CoinClientController::class, 'store'])->name('coins.add');
    Route::get('/showCoins',[CoinClientController::class, 'show'])->name('coins.show');
});

Route::get('/login', [AuthClientController::class, 'login'])->name('dang-nhap');
Route::post('/saveLogin', [AuthClientController::class, 'saveLogin'])->name('save-dang-nhap');
Route::get('/register', [AuthClientController::class, 'register'])->name('dang-ky');
Route::post('/saveRegister', [AuthClientController::class, 'saveRegister'])->name('save-dang-ky');
Route::get('/logout', [AuthClientController::class, 'logout'])->name('dang-xuat');
