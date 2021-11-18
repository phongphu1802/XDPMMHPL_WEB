<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminMenuLeftController;
use App\Http\Controllers\Position_PermissionController;
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
Route::get('/dashboard',[LoginController::class, 'decentralization']);
Route::get('/logout',[LoginController::class, 'logout']);
Route::post('/admin-dashboard',[LoginController::class, 'check_login']);

Route::get('/admin',[LoginController::class, 'decentralization']);

Route::prefix('admin')->group(function () {
    Route::get('',[LoginController::class, 'decentralization']);
    Route::get('/1',[LoginController::class, 'decentralization']);
    Route::get('/2',[LoginController::class, 'decentralization']);
    Route::get('/3',[LoginController::class, '']);
    Route::get('/4',[LoginController::class, '']);
    Route::get('/5',[LoginController::class, '']);
    Route::get('/6',[LoginController::class, '']);
    Route::get('/7',[LoginController::class, '']);
    Route::get('/8',[LoginController::class, '']);
    Route::get('/9',[LoginController::class, '']);
    Route::get('/10',[LoginController::class, '']);
    Route::get('/11',[LoginController::class, '']);
    Route::prefix('/12')->group(function () {
        Route::get('',[AccountController::class, 'account_management']);
        Route::get('/add',[AccountController::class, 'add_account']);
        Route::post('/add_account',[AccountController::class, 'add_save_account']);
        Route::post('/hidden',[AccountController::class, 'hidden_account']);
        Route::post('/unhidden',[AccountController::class, 'unhidden_account']);
    });

    Route::prefix('/13')->group(function () {
        Route::get('',[Position_PermissionController::class, 'permission_management']);
        Route::get('/add',[Position_PermissionController::class, 'add_position_permission']);
        Route::post('/add-save',[Position_PermissionController::class, 'repair_save_position_permission']);
        Route::post('/hidden',[Position_PermissionController::class, 'hidden_position_permission']);
        Route::get('/unhidden',[Position_PermissionController::class, 'unhidden_position_permission']);
        Route::post('/unhidden-save',[Position_PermissionController::class, 'unhidden_save_position_permission']);
        Route::get('/repair',[Position_PermissionController::class, 'repair_position_permission']);
        Route::post('/repair-save',[Position_PermissionController::class, 'repair_save_position_permission']);
        
    });
//    Route::get('/13',[PermissionController::class, 'permission_management']);
});
