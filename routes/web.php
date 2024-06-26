<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\FloorController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\EnergyConsumptionController;   
use App\Http\Controllers\AboutController;
use App\Http\Controllers\featuresController;
use App\Http\Controllers\faqsController;
use App\Http\Controllers\piechartController;
use App\Http\Controllers\BarChartController;
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
    'devices' => DeviceController::class,
]);

Route::delete('/deleteRoles', [RoleController::class, 'deleteRoles'])->name('deleteRoles');

Route::delete('/destroyMultiple', [UserController::class, 'destroyMultiple'])->name('destroyMultiple');

Route::get('{building_id}/floors', [FloorController::class, 'index'])->name('floors.index');

Route::get('rooms', [RoomController::class, 'index'])->name('rooms.index');

Route::get('{room_id}/devices', [DeviceController::class, 'index'])->name('devices.index');

Route::get('/dashboard', function () {
    // Call the dashboard method of BuildingController
    $buildingController = new BuildingController();
    $buildingData = $buildingController->dashboard();

    // Call the dashboard method of DeviceController
    $deviceController = new DeviceController();
    $deviceData = $deviceController->dashboard();

    // Call the dashboard method of EnergyConsumptionController
    $energyController = new EnergyConsumptionController();
    $energyData = $energyController->dashboard();

    // Merge the data from all controllers
    $mergedData = array_merge($buildingData->getData(), $deviceData->getData(), $energyData->getData());

    // Pass the merged data to the dashboard view
    return view('dashboard')->with($mergedData);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/energy', [EnergyConsumptionController::class, 'index'])->name('energy.index');
Route::get('/about', [AboutController::class,'index'])->name('about');
Route::get('/features', [featuresController::class,'index'])->name('features');
Route::get('/faqs', [faqsController::class,'index'])->name('faqs');
Route::get('/piechart', [piechartController::class,'index'])->name('piechart');
Route::get('/barchart', [BarChartController::class,'index'])->name('barchart');


Route::get('/search/buildings', 'BuildingController@search')->name('buildings.search');
Route::get('/search', 'DeviceController@search')->name('devices.search');



require __DIR__.'/auth.php';
