<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManagerController;


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


/*
|--------------------------------------------------------------------------
| User
|--------------------------------------------------------------------------
*/

Route::group(['middleware'=>['auth','isUser']], function(){
    Route::get('/dashboard',[AuthenticatedSessionController::class,'index'])->name('dashboard');
});



/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

Route::group(['middleware'=>['auth']], function(){
    Route::get('/profile',[DashboardController::class,'profile'])->name('profile');

    Route::get('/admin_edit',[DashboardController::class,'admin_edit'])->name('admin_edit');
    Route::post('/update',[DashboardController::class,'Update'])->name('update');

    Route::get('/change_password',[DashboardController::class,'change_password'])->name('change_password');
    Route::post('/update_password',[DashboardController::class,'Update_password'])->name('update_password');

    Route::get('/user_list',[DashboardController::class,'user_list'])->name('user_list');
    Route::get('user_edit/{id}',[DashboardController::class,'user_edit'])->name('user_edit');
    Route::post('update_user',[DashboardController::class,'update_user'])->name('update_user');
});



/*
|--------------------------------------------------------------------------
| Manager
|--------------------------------------------------------------------------
*/


Route::group(['middleware'=>['auth']], function(){
    Route::get('crud',[ManagerController::class,'hire_manager'])->name('hire_manager');
    Route::post('crud_save',[ManagerController::class,'save_hire_manager'])->name('save_hire_manager');
    Route::get('edit_manager/{id}',[ManagerController::class,'edit_manager'])->name('edit_manager');
    Route::post('update_manager',[ManagerController::class,'update_manager'])->name('update_manager');
    Route::get('delete_manager/{id}',[ManagerController::class,'delete_manager'])->name('delete_manager');
  
});



require __DIR__.'/auth.php';
