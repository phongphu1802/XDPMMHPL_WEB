<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminMenuLeftController;
use App\Http\Controllers\AccountController;
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

//Route::get('/', function () {
//    return view('welcome');
//});
//Route::get('/trang-chu', function () {
//    return view('welcome');
//});

//Frontend
Route::get('/', [HomeController::class, 'index']);
Route::get('/home',[HomeController::class, 'index']);
//Backend;
//Route::get('/admin',[AdminController::class, 'decentralization']);
Route::get('/dashboard',[AdminController::class, 'decentralization']);
Route::get('/logout',[AdminController::class, 'logout']);
Route::post('/admin-dashboard',[AdminController::class, 'check_login']);

Route::get('/admin',[AdminController::class, 'decentralization']);

Route::prefix('admin')->group(function () {
    Route::get('',[AdminController::class, 'decentralization']);
    Route::get('/1',[AdminController::class, '']);
    Route::get('/2',[AdminController::class, '']);
    Route::get('/3',[AdminController::class, '']);
    Route::get('/4',[AdminController::class, '']);
    Route::get('/5',[AdminController::class, '']);
    Route::get('/6',[AdminController::class, '']);
    Route::get('/7',[AdminController::class, '']);
    Route::get('/8',[AdminController::class, '']);
    Route::get('/9',[AdminController::class, '']);
    Route::get('/10',[AdminController::class, '']);
    Route::get('/11',[AdminController::class, '']);
    Route::get('/12',[AccountController::class, 'account_management']);
    Route::get('/13',[AccountController::class, 'permission_management']);
});
