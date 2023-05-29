<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GoogleCalendarEventController;
use App\Http\Controllers\IncomingMailController;
use App\Http\Controllers\InstagramPostController;
use App\Http\Controllers\OutgoingMailController;
use App\Http\Controllers\WhatsAppChatController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LoginController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');;
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::resource('/dashboard/users', UserController::class)->middleware('auth');
Route::get('/dashboard/profile/{user}', [UserController::class, 'show'])->middleware('auth');
Route::put('/dashboard/profile', [UserController::class, 'updateProfile'])
    ->middleware('auth');

Route::resource('/dashboard/jobs', JobController::class)->middleware('auth');

Route::resource('/dashboard/employees', EmployeeController::class)->middleware('auth');

Route::resource('/dashboard/mails/incoming-mails', IncomingMailController::class)->middleware('auth');

Route::resource('/dashboard/mails/outgoing-mails', OutgoingMailController::class)->middleware('auth');

Route::resource('/dashboard/social/instagram', InstagramPostController::class)->middleware('auth');

Route::resource('/dashboard/social/whatsapp', WhatsAppChatController::class)->middleware('auth');

Route::resource('/dashboard/calendar', GoogleCalendarEventController::class)->middleware('auth');