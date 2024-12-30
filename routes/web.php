<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController ;
use App\Http\Controllers\AuthController ;
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

/*Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', [UserController::class, 'index']);
Route::get('admin', [AdminController::class, 'index'])->name('admin')->middleware('auth');
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('admin/albums', [AdminController::class, 'list_albums'])->name('admin.albums')->middleware('auth');
Route::get('admin/albums/edit/{id}', 
    [AdminController::class, 'edit_album'])
    ->name('admin.albums.edit')
    ->middleware('auth');



Route::post('admin/albums/save',
    [AdminController::class, 'save_album'])
    ->name('admin.albums.save');

Route::get('admin/albums/delete/{id}', 
    [AdminController::class, 'delete_album'])
    ->name('admin.albums.delete')
    ->middleware('auth');


Route::get('admin.albums/create', 
    [AdminController::class, 'create_album'])
    ->name('admin.albums.create')
    ->middleware('auth');