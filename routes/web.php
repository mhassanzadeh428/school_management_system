<?php

use Illuminate\Support\Facades\Route;
USE App\Http\Controllers\AdminController;
USE App\Http\Controllers\Backend;
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
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});

Route::get('/admin/logout',[AdminController::class,'Logout'])->name('admin.logout');
//User Mangement All Routes

Route::prefix('users')->group(function(){
    Route::get('/view',[Backend\UserController::class,'UserView'])->name('user.view');

    Route::get('/add',[Backend\UserController::class,'UserAdd'])->name('users.add');

    Route::post('/store',[Backend\UserController::class,'UserStore'])->name('users.store');

    Route::get('/edit/{id}',[Backend\UserController::class,'UserEdit'])->name('users.edit');

    Route::post('/update/{id}',[Backend\UserController::class,'UserUpdate'])->name('users.update');

    Route::get('/delete/{id}',[Backend\UserController::class,'UserDelete'])->name('users.delete');
});

///User Profile and Change Password
///

Route::prefix('profiles')->group(function(){
    Route::get('/view',[Backend\ProfileController::class,'ProfileView'])->name('profile.view');
    Route::get('/edit',[Backend\ProfileController::class,'ProfileEdit'])->name('profile.edit');
    Route::post('/store',[Backend\ProfileController::class,'ProfileStore'])->name('profile.store');
    Route::get('/password/view',[Backend\ProfileController::class,'PasswordView'])->name('password.view');
    Route::post('/password/update',[Backend\ProfileController::class,'PasswordUpdate'])->name('password.update');
});



Route::prefix('setups')->group(function(){

    //Student Class Route
    Route::get('student/class/view',[Backend\Setup\StudentClassController::class,'ViewStudent'])->name('student.class.view');

    Route::get('student/class/add',[Backend\Setup\StudentClassController::class,'StudentClassAdd'])->name('student.class.add');

    Route::post('student/class/store',[Backend\Setup\StudentClassController::class,'StudentClassStore'])->name('store.student.class');

    Route::get('student/class/edit/{id}',[Backend\Setup\StudentClassController::class,'StudentClassEdit'])->name('student.class.edit');

    Route::post('student/class/update/{id}',[Backend\Setup\StudentClassController::class,'StudentClassUpdate'])->name('student.class.update');

    Route::get('student/class/delete/{id}',[Backend\Setup\StudentClassController::class,'StudentClassDelete'])->name('student.class.delete');

    //Student Year Route
    Route::get('student/year/view',[Backend\Setup\StudentYearController::class,'ViewYear'])->name('student.year.view');

    Route::get('student/year/add',[Backend\Setup\StudentYearController::class,'StudentYearAdd'])->name('student.year.add');

    Route::post('student/year/store',[Backend\Setup\StudentYearController::class,'StudentYearStore'])->name('store.student.year');

    Route::get('student/year/edit/{id}',[Backend\Setup\StudentYearController::class,'StudentYearEdit'])->name('student.year.edit');

    Route::post('student/year/update/{id}',[Backend\Setup\StudentYearController::class,'StudentYearUpdate'])->name('student.year.update');

    Route::get('student/year/delete/{id}',[Backend\Setup\StudentYearController::class,'StudentYearDelete'])->name('student.year.delete');
});
