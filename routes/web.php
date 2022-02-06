<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\PostController as BackendPostController;
use App\Http\Controllers\Backend\TagController;
use App\Http\Controllers\Frontend\PostController as FrontendPostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [FrontendPostController::class, 'index'])->name('frontend.post.index');
Route::get('/posts/{post:slug}', [FrontendPostController::class, 'show'])->name('frontend.post.show');

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {

    // TODO: Add the Roles that can see the following routes: Admin | Writer
    Route::group(['prefix' => 'dashboard'], function (){

        Route::view('/', 'backend.dashboard')->name('dashboard');

        Route::resource('/posts', BackendPostController::class);

        Route::resource('/users', UserController::class)->except('show');

        Route::resource('/categories', CategoryController::class)->except('show');

        Route::resource('/tags', TagController::class)->except('show');
    });

});

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');
