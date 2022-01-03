<?php

use App\Http\Controllers\Owner\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Owner\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Owner\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Owner\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Owner\Auth\NewPasswordController;
use App\Http\Controllers\Owner\Auth\PasswordResetLinkController;
use App\Http\Controllers\Owner\Auth\RegisteredUserController;
use App\Http\Controllers\Owner\Auth\VerifyEmailController;
use App\Http\Controllers\Owner\CourseController;
use App\Http\Controllers\Owner\CourseDetailsController;
use App\Http\Controllers\Owner\ScheduleController;
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
    return view('owner.welcome');
});

Route::resource('course', CourseController::class)
    ->middleware('auth:owners');

Route::prefix('schedule')->
    middleware('auth:owners')->group(function(){
        Route::get('index/{course_id}', [ScheduleController::class, 'index'])->name('schedule.index');
        Route::get('createById/{course_id}', [ScheduleController::class, 'createById'])->name('schedule.createById');
        Route::get('edit/{course_id}', [ScheduleController::class, 'edit'])->name('schedule.edit');
        Route::post('store', [ScheduleController::class, 'store'])->name('schedule.store');
    });

Route::prefix('course_details')->
    middleware('auth:owners')->group(function(){
        Route::get('index/{course_id}', [CourseDetailsController::class, 'index'])->name('course_details.index');
        Route::get('createById/{course_id}', [CourseDetailsController::class, 'createById'])->name('course_details.createById');
        Route::get('edit/{course_id}', [CourseDetailsController::class, 'edit'])->name('course_details.edit');
        Route::post('store', [CourseDetailsController::class, 'store'])->name('course_details.store');
    });

Route::get('/dashboard', function () {
    return view('owner.dashboard');
})->middleware(['auth:owners'])->name('dashboard');


Route::get('/register', [RegisteredUserController::class, 'create'])
                ->middleware('guest')
                ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
                ->middleware('guest');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest')
                ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
                ->middleware('guest');

Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
                ->middleware('guest')
                ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
                ->middleware('guest')
                ->name('password.email');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
                ->middleware('guest')
                ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
                ->middleware('guest')
                ->name('password.update');

Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->middleware('auth:owners')
                ->name('verification.notice');

Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['auth:owners', 'signed', 'throttle:6,1'])
                ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware(['auth:owners', 'throttle:6,1'])
                ->name('verification.send');

Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->middleware('auth:owners')
                ->name('password.confirm');

Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
                ->middleware('auth:owners');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth:owners')
                ->name('logout');
