<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\EmployeeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin/logout', [AdminController::class, 'AdminDestroy'])->name('admin.logout');
Route::get('/logout', [AdminController::class, 'AdminLogoutPage'])->name('admin.logout.page');

Route::middleware('auth')->controller(AdminController::class)->group(function () {
    Route::get('/admin/profile', 'AdminProfile')->name('admin.profile');
    Route::post('/admin/profile/store', 'AdminProfileStore')->name('admin.profile.store');
    Route::get('/change/password', 'ChangePassword')->name('change.password');
    Route::post('/update/password', 'UpdatePassword')->name('update.password');
});

Route::controller(EmployeeController::class)->group(function () {
    Route::get('/all/employee', 'AllEmployee')->name('all.employee');
    Route::get('/add/employee', 'AddEmployee')->name('add.employee');
    Route::post('/store/employee', 'StoreEmployee')->name('employee.store');
    Route::get('/edit/employee/{id}', 'EditEmployee')->name('edit.employee');
    Route::post('/update/employee', 'UpdateEmployee')->name('employee.update');
    Route::get('/delete/employee/{id}', 'DeleteEmployee')->name('delete.employee');
});

require __DIR__.'/auth.php';
