<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\TagsController;
use App\Http\Controllers\Admin\AdsController;
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

Route::get('/lang/{lang}', function ($lang) {
    session(['lang'=>$lang]);
    return back();
});

Route::get('/', [MainController::class, 'index']);
Route::get('/category/{slug}', [MainController::class, 'categoryPosts'])->name('categoryPosts');
Route::get('/posts/{slug}', [MainController::class, 'postDetail'])->name('postDetail');
Route::get('/contact', [MainController::class, 'contact'])->name('contact');
Route::post('/contact', [MainController::class, 'sendMail'])->name('sendMail');
Route::get('/search', [MainController::class, 'search'])->name('search');


Route::prefix('admin')->middleware('auth')->name('admin.')->group(function(){
    Route::resource('categories', CategoriesController::class);
    Route::resource('posts', PostsController::class);
    Route::resource('tags', TagsController::class);
    Route::resource('ads', AdsController::class);
    Route::post('/post-image-upload', [PostsController::class, 'upload'])->name('upload');
    Route::get('/dashboard', function () {
    return view('admin.dashboard');
    })->name('dashboard');
});


require __DIR__.'/auth.php';
