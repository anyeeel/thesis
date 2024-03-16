<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\FloorController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Logout
Route::post('/logout', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::resources([
    'roles' => RoleController::class,
    'users' => UserController::class,
    'buildings' => BuildingController::class,
    'floors' => FloorController::class,
    'rooms' => RoomController::class,
    
]);

Route::delete('/deleteRoles', [RoleController::class, 'deleteRoles'])->name('deleteRoles');

Route::delete('/destroyMultiple', [UserController::class, 'destroyMultiple'])->name('destroyMultiple');

Route::get('{building_id}/floors', [FloorController::class, 'index'])->name('floors.index');

Route::get('rooms', [RoomController::class, 'index'])->name('rooms.index');

require __DIR__.'/auth.php';
