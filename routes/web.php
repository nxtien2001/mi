<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ResignterController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\StudentController;
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

// đăng nhập bằng jetstream
// Route::middleware(['auth:sanctum', 'verified'])->group(function () {
//     Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
// });

// đăng nhập bằng check verify_email
// Route::middleware(['check_user'])->group(function () {
//     Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
// });

Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

Route::get('verify/{user}/{token}', [UserController::class, 'verify'])->name('verify');
Route::get('dang-xuat',  [UserController::class, 'logout'])->name('auth.logout');

Route::prefix('students')->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('students.index');
    Route::get('/create', [StudentController::class, 'create'])->name('students.create');
});

Route::prefix('cars')->group(function () {
    Route::get('/', [CarController::class, 'index'])->name('cars.index');
    Route::get('/create', [CarController::class, 'create'])->name('cars.create');
});

Route::get('dang-nhap', [LoginController::class, 'getLogin'])->name('loginForm');
Route::post('dang-nhap',  [LoginController::class, 'postLogin'])->name('auth.login');

Route::get('/dang-ky', [ResignterController::class, 'getRegister'])->name('getRegister');
Route::post('/dang-ky', [ResignterController::class, 'postRegister'])->name('postRegister');

Route::get('/login/google', [SocialiteController::class, 'loginFromGoogle'])->name('login.google');
Route::get('/login/google/callback', [SocialiteController::class, 'callbackFromGoogle']);

Route::get('/login/facebook', [SocialiteController::class, 'loginFromFacebook'])->name('login.facebook');
Route::get('/login/facebook/callback', [SocialiteController::class, 'callbackFromfacebook']);

Route::get('/login/github', [SocialiteController::class, 'loginFromGithub'])->name('login.github');
Route::get('/login/github/callback', [SocialiteController::class, 'callbackFromGithub']);

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::get('change-password', [ChangePasswordController::class, 'showChangePasswordForm'])->name('change.password.get');
Route::post('change-password', [ChangePasswordController::class, 'submitChangePasswordForm'])->name('change.password.post');
