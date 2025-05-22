<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InfoCenterController;
use App\Http\Controllers\NotificationController;

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
// User Authentication
Route::get('', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'authenticate'])->name('logmasuk');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('daftar');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/forgotPassword', [AuthController::class, 'forgotPassword'])->name('forgotPassword');
Route::post('/updatePassword', [AuthController::class, 'update'])->name('forgot');

// Dashboard
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

// User
Route::get('users', [UserController::class, 'index'])->name('users');
Route::get('get_users', [UserController::class, 'getUsers'])->name('get_users');
Route::post('add_users', [UserController::class, 'store'])->name('add_users');
Route::post('user_update', [UserController::class, 'update'])->name('user_update');
Route::post('/users/delete/{id}', [UserController::class, 'softDelete'])->name('users.softDelete');
Route::post('/users/restore/{id}', [UserController::class, 'restore'])->name('users.restore');
Route::get('profile', [UserController::class, 'profile'])->name('profile');
Route::post('/profileUpdate', [UserController::class, 'profileUpdate'])->name('profileUpdate');
Route::get('/list_role', [UserController::class, 'getRoles'])->name('list_role');

//Role
Route::get('get_roles', [RoleController::class, 'getRoles'])->name('get_roles');
Route::post('add_roles', [RoleController::class, 'store'])->name('add_roles');
Route::post('edit_roles', [RoleController::class, 'update'])->name('edit_roles');

// Category
Route::get('category', [CategoryController::class, 'index'])->name('category');
Route::get('get_category', [CategoryController::class, 'getCategory'])->name('get_category');

// Level
Route::get('level', [LevelController::class, 'index'])->name('level');
Route::get('/get_level', [LevelController::class, 'getLevel'])->name('get_level');
Route::post('add-level', [LevelController::class, 'add'])->name('level_add');

// Service
Route::get('service', [ServiceController::class, 'index'])->name('service');
Route::get('/get_service', [ServiceController::class, 'getService'])->name('get_service');
Route::post('add-service', [ServiceController::class, 'add'])->name('service_add');
Route::post('service_edit', [ServiceController::class, 'update'])->name('service_edit');

// Ticket
Route::get('/get_ticket', [TicketController::class, 'getTicket'])->name('get_ticket');
Route::post('add-ticket', [TicketController::class, 'add'])->name('ticket_add');
Route::get('/ticket_status/{id}', [TicketController::class, 'ticket_status'])->name('ticket_status');
Route::get('ticket_status/{ticket_no}/histories', [TicketController::class, 'getHistories'])->where('ticket_no', '.*')->name('ticket.histories');
Route::post('ticket_assign', [TicketController::class, 'ticket_assign'])->name('ticket_assign');
Route::post('ticket_edit', [TicketController::class, 'update'])->name('ticket_edit');
Route::post('ticket_update', [TicketController::class, 'ticket_update'])->name('ticket_update');
Route::post('ticket_delete', [TicketController::class, 'destroy'])->name('ticket_delete');

//Group
Route::get('/group', [GroupController::class, 'index'])->name('group');
Route::get('/get_group', [GroupController::class, 'getGroup'])->name('get_group');
Route::post('add-group', [GroupController::class, 'add'])->name('group_add');
Route::post('edit-group', [GroupController::class, 'edit'])->name('group_edit');

//Info Center
Route::get('/info-center', [InfoCenterController::class,'index'])->name('info-center');
