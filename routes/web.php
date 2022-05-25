<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{DashboardController, UserController, RoleController,
    DriverController,
    JalurController,
    KendaraanController,
    PenumpangController,
    PosisiController};

// Route::get('/', function () {return view('welcome');});

Route::get('/', [PosisiController::class, 'index'])->name('index');

Route::group([
	'middleware' => 'auth',
	'prefix' => 'admin',
	'as' => 'admin.'
], function(){
	Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //jadwal atau shcedule
    Route::get('/jadwal',[JalurController::class, 'index'])->name('jadwal');
    Route::get('/jadwal/create',[JalurController::class, 'create'])->name('jadwal.create');
    Route::post('/jadwal/store',[JalurController::class, 'store'])->name('jadwal.store');
    Route::get('/jadwal/{id}/edit',[JalurController::class, 'edit'])->name('jadwal.edit');
    Route::post('/jadwal/{id}/update',[JalurController::class, 'update'])->name('jadwal.update');
    Route::post('/jadwal/{id}/delete',[JalurController::class, 'destroy'])->name('jadwal.delete');

    //tiket dan pembeli
    Route::get('/tiket',[PenumpangController::class, 'index'])->name('tiket');
    Route::get('/tiket/create',[PenumpangController::class, 'create'])->name('tiket.create');
    Route::post('/tiket/store',[PenumpangController::class, 'store'])->name('tiket.store');
    Route::get('/tiket/{id}/edit',[PenumpangController::class, 'edit'])->name('tiket.edit');
    Route::post('/tiket/{id}/update',[PenumpangController::class, 'update'])->name('tiket.update');
    Route::post('/tiket/{id}/delete',[PenumpangController::class, 'destroy'])->name('delete');

    //kendaraan
    Route::get('/kendaraan',[KendaraanController::class, 'index'])->name('kendaraan');
    Route::get('/kendaraan/create',[KendaraanController::class, 'create'])->name('kendaraan.create');
    Route::post('/kendaraan/store',[KendaraanController::class, 'store'])->name('kendaraan.store');
    Route::get('/kendaraan{id}/edit',[KendaraanController::class, 'edit'])->name('kendaraan.edit');
    Route::post('/kendaraan/{id}/update',[KendaraanController::class, 'update'])->name('kendaraan.update');
    Route::post('/kendaraan/{id}/delete',[KendaraanController::class, 'destroy'])->name('kendaraan.delete');

    //driver
    Route::get('/driver', [DriverController::class, 'index'])->name('driver');
    Route::get('/driver/create', [DriverController::class, 'create'])->name('driver.create');
    Route::post('/driver/store', [DriverController::class, 'store'])->name('driver.store');
    Route::get('/driver/{id}/edit', [DriverController::class, 'edit'])->name('driver.edit');
    Route::post('/driver/{id}/update', [DriverController::class, 'update'])->name('driver.update');
    Route::post('/driver/{id}/delete', [DriverController::class, 'destroy'])->name('driver.delete');

	Route::get('/logs', [DashboardController::class, 'activity_logs'])->name('logs');
	Route::post('/logs/delete', [DashboardController::class, 'delete_logs'])->name('logs.delete');

	// Settings menu
	Route::view('/settings', 'admin.settings')->name('settings');
	Route::post('/settings', [DashboardController::class, 'settings_store'])->name('settings');

	// Profile menu
	Route::view('/profile', 'admin.profile')->name('profile');
	Route::post('/profile', [DashboardController::class, 'profile_update'])->name('profile');
	Route::post('/profile/upload', [DashboardController::class, 'upload_avatar'])
		->name('profile.upload');

	// Member menu
	Route::get('/member', [UserController::class, 'index'])->name('member');
	Route::get('/member/create', [UserController::class, 'create'])->name('member.create');
	Route::post('/member/create', [UserController::class, 'store'])->name('member.create');
	Route::get('/member/{id}/edit', [UserController::class, 'edit'])->name('member.edit');
	Route::post('/member/{id}/update', [UserController::class, 'update'])->name('member.update');
	Route::post('/member/{id}/delete', [UserController::class, 'destroy'])->name('member.delete');

	// Roles menu
	Route::get('/roles', [RoleController::class, 'index'])->name('roles');
	Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
	Route::post('/roles/create', [RoleController::class, 'store'])->name('roles.create');
	Route::get('/roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
	Route::post('/roles/{id}/update', [RoleController::class, 'update'])->name('roles.update');
	Route::post('/roles/{id}/delete', [RoleController::class, 'destroy'])->name('roles.delete');
});


require __DIR__.'/auth.php';
