<?php
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('list_songscategory', [App\Http\Controllers\backend\SongscategoryController::class,'SongsCategoryList'])->name('songscategory.index');
Route::get('/add_songscategory',[App\Http\Controllers\backend\SongscategoryController::class,'SongsCategoryAdd'])->name('songscategoryadd');
Route::post('/insert_songscategory', [App\Http\Controllers\backend\SongscategoryController::class,'SongsCategoryInsert']);
Route::resource('/posts', \App\Http\Controllers\SongscategoryController::class);
Route::get('/edit_songscategory/{id}', [App\Http\Controllers\backend\SongscategoryController::class,'SongsEditCategory']);
Route::post('/update_songscategory/{id}', [App\Http\Controllers\backend\SongscategoryController::class,'SongsUpdateCategory']);
Route::get('/delete_songscategory/{id}', [App\Http\Controllers\backend\SongscategoryController::class,'SongsDeleteCategory']);

Route::get('user_list', [App\Http\Controllers\backend\UsermanagementController::class,'UserList'])->name('user.index');
Route::get('/edit_user/{id}', [App\Http\Controllers\backend\UsermanagementController::class,'UserEdit']);
Route::post('/update_user/{id}', [App\Http\Controllers\backend\UsermanagementController::class,'UserUpdate']);
Route::get('/delete_user/{id}', [App\Http\Controllers\backend\UsermanagementController::class,'UserDelete']);
