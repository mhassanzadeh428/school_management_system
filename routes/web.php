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

    //Student Group Route
    Route::get('student/group/view',[Backend\Setup\StudentGroupController::class,'ViewGroup'])->name('student.group.view');

    Route::get('student/group/add',[Backend\Setup\StudentGroupController::class,'StudentGroupAdd'])->name('student.group.add');

    Route::post('student/group/store',[Backend\Setup\StudentGroupController::class,'StudentGroupStore'])->name('store.student.group');

    Route::get('student/group/edit/{id}',[Backend\Setup\StudentGroupController::class,'StudentGroupEdit'])->name('student.group.edit');

    Route::post('student/group/update/{id}',[Backend\Setup\StudentGroupController::class,'StudentGroupUpdate'])->name('student.group.update');

    Route::get('student/group/delete/{id}',[Backend\Setup\StudentGroupController::class,'StudentGroupDelete'])->name('student.group.delete');


    //Student Shift Route
    Route::get('student/shift/view',[Backend\Setup\StudentShiftController::class,'ViewShift'])->name('student.shift.view');

    Route::get('student/shift/add',[Backend\Setup\StudentShiftController::class,'StudentShiftAdd'])->name('student.shift.add');

    Route::post('student/shift/store',[Backend\Setup\StudentShiftController::class,'StudentShiftStore'])->name('store.student.shift');

    Route::get('student/shift/edit/{id}',[Backend\Setup\StudentShiftController::class,'StudentShiftEdit'])->name('student.shift.edit');

    Route::post('student/shift/update/{id}',[Backend\Setup\StudentShiftController::class,'StudentShiftUpdate'])->name('student.shift.update');

    Route::get('student/shift/delete/{id}',[Backend\Setup\StudentShiftController::class,'StudentShiftDelete'])->name('student.shift.delete');

    //Fee Category  Route
    Route::get('fee/category/view',[Backend\Setup\FeeCategoryController::class,'ViewFeeCat'])->name('fee.category.view');

    Route::get('fee/category/add',[Backend\Setup\FeeCategoryController::class,'FeeCatAdd'])->name('fee.category.add');

    Route::post('fee/category/store',[Backend\Setup\FeeCategoryController::class,'FeeCatStore'])->name('store.fee.category');

    Route::get('fee/category/edit/{id}',[Backend\Setup\FeeCategoryController::class,'FeeCatEdit'])->name('fee.category.edit');

    Route::post('fee/category/update/{id}',[Backend\Setup\FeeCategoryController::class,'FeeCatUpdate'])->name('fee.category.update');

    Route::get('fee/category/delete/{id}',[Backend\Setup\FeeCategoryController::class,'FeeCatDelete'])->name('fee.category.delete');


    //Fee Category Amount
    Route::get('fee/amount/view',[Backend\Setup\FeeAmountController::class,'ViewFeeAmount'])->name('fee.amount.view');

    Route::get('fee/amount/add',[Backend\Setup\FeeAmountController::class,'AddFeeAmount'])->name('fee.amount.add');

    Route::post('fee/amount/store',[Backend\Setup\FeeAmountController::class,'FeeAmountStore'])->name('store.fee.amount');

    Route::get('fee/amount/edit/{fee_category_id}',[Backend\Setup\FeeAmountController::class,'FeeAmountEdit'])->name('fee.amount.edit');

    Route::post('fee/amount/update/{fee_category_id}',[Backend\Setup\FeeAmountController::class,'FeeAmountUpdate'])->name('update.fee.amount');

    Route::get('fee/amount/details/{fee_category_id}',[Backend\Setup\FeeAmountController::class,'FeeAmountDetails'])->name('fee.amount.details');



    // Exam Type
    Route::get('exam/type/view',[Backend\Setup\ExamTypeController::class,'ViewExamType'])->name('exam.type.view');

    Route::get('exam/type/add',[Backend\Setup\ExamTypeController::class,'ExamTypeAdd'])->name('exam.type.add');

    Route::post('exam/type/store',[Backend\Setup\ExamTypeController::class,'ExamTypeStore'])->name('store.exam.type');

    Route::get('exam/type/edit/{id}',[Backend\Setup\ExamTypeController::class,'ExamTypeEdit'])->name('exam.type.edit');

    Route::post('exam/type/update/{id}',[Backend\Setup\ExamTypeController::class,'ExamTypeUpdate'])->name('exam.type.update');

    Route::get('exam/type/delete/{id}',[Backend\Setup\ExamTypeController::class,'ExamTypeDelete'])->name('exam.type.delete');


});

