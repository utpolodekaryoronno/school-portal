<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

Route::get('/', [StudentController::class, 'index'])->name('home');


// Student Routes
Route::get('/register', [StudentController::class, 'showRegister'])->name('register')->Middleware('loggedinMiddleware');
Route::post('/register', [StudentController::class, 'register'])->name('register.store');

Route::get('/login', [StudentController::class, 'showLogin'])->name('login')->Middleware('loggedinMiddleware');
Route::post('/login', [StudentController::class, 'login'])->name('login.store');

Route::get('/dashboard', [StudentController::class, 'Dashboard'])->name('dashboard')->Middleware('login-checking');
Route::get('/profile', [StudentController::class, 'profile'])->name('profile')->Middleware('login-checking');
Route::get('/profile/edit', [StudentController::class, 'editProfile'])->name('profile.edit')->Middleware('login-checking');
Route::put('/profile/edit', [StudentController::class, 'updateProfile'])->name('profile.update');

Route::delete('/profile/delete', [StudentController::class, 'deleteProfile'])->name('profile.delete');

Route::post('/logout', [StudentController::class, 'logout'])->name('logout');
Route::get('/logout', function () {
    return redirect()->route('login');
});



// Staff Routes
Route::get('/staff/register', [StaffController::class, 'showRegisterStaff'])->name('register.staff')->Middleware('loggedinMiddlewareStaff');
Route::post('/staff/register', [StaffController::class, 'registerStaff'])->name('register.store.staff');

Route::get('/staff/login', [StaffController::class, 'showLoginStaff'])->name('login.staff')->Middleware('loggedinMiddlewareStaff');
Route::post('/staff/login', [StaffController::class, 'loginStaff'])->name('login.store.staff');


Route::get('/staff/accountant', [StaffController::class, 'Accountant'])->name('accountant.dashboard')->Middleware('RoleChecker');
Route::get('/staff/dashboard', [StaffController::class, 'StaffDashboard'])->name('staff.dashboard')->Middleware('RoleChecker');


Route::get('/staff/profile', [StaffController::class, 'profileStaff'])->name('profile.staff')->Middleware('login-checking-staff');
Route::get('/staff/edit', [StaffController::class, 'editStaff'])->name('edit.staff')->Middleware('login-checking-staff');
Route::put('/staff/edit', [StaffController::class, 'updateStaff'])->name('update.staff')->Middleware('login-checking-staff');

Route::delete('/profile/delete/staff', [StaffController::class, 'deleteStaff'])->name('delete.staff');

Route::post('/staff/logout', [StaffController::class, 'logoutStaff'])->name('logout.staff');
Route::get('/staff/logout', function () {
    return redirect()->route('login.staff');
});



// teacher Routes
Route::get('/teacher/register', [TeacherController::class, 'showRegisterTeacher'])->name('register.teacher')->Middleware('loggedinMiddlewareTeacher');
Route::post('/teacher/register', [TeacherController::class, 'registerTeacher'])->name('register.store.teacher');

Route::get('/teacher/login', [TeacherController::class, 'showLoginTeacher'])->name('login.teacher')->Middleware('loggedinMiddlewareTeacher');
Route::post('/teacher/login', [TeacherController::class, 'loginTeacher'])->name('login.store.teacher');


Route::get('/teacher/dashboard', [TeacherController::class, 'dashboardTeacher'])->name('dashboard.teacher')->Middleware('login-checking-teacher');
Route::get('/teacher/profile', [TeacherController::class, 'profileTeacher'])->name('profile.teacher')->Middleware('login-checking-teacher');
Route::get('/teacher/edit', [TeacherController::class, 'EditTeacher'])->name('edit.teacher')->Middleware('login-checking-teacher');
Route::put('/teacher/edit', [TeacherController::class, 'UpdateTeacher'])->name('update.teacher')->Middleware('login-checking-teacher');
Route::delete('/teacher/delete', [TeacherController::class, 'DeleteTeacher'])->name('delete.teacher');

Route::post('/teacher/logout', [TeacherController::class, 'logoutTeacher'])->name('logout.teacher');
Route::get('/teacher/logout', function () {
    return redirect()->route('login.teacher');
});




// Admin routs
Route::get('/admin/login', [AdminController::class, 'showLoginAdmin'])->name('login.admin')->Middleware('loggedinMiddlewareAdmin');
Route::post('/admin/login', [AdminController::class, 'loginAdmin'])->name('login.store.admin');
Route::get('/admin/dashboard', [AdminController::class, 'dashboardAdmin'])->name('dashboard.admin')->Middleware('login-checking-admin');
Route::get('/admin/profile', [AdminController::class, 'profileAdmin'])->name('profile.admin')->Middleware('login-checking-admin');
Route::get('/admin/edit', [AdminController::class, 'EditAdmin'])->name('edit.admin')->Middleware('login-checking-admin');
Route::put('/admin/edit', [AdminController::class, 'UpdateAdmin'])->name('update.admin')->Middleware('login-checking-admin');
Route::post('/admin/logout', [AdminController::class, 'logoutAdmin'])->name('logout.admin');
Route::get('/admin/logout', function () {
    return redirect()->route('login.teacher');
});
