<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeInformationController;
use Illuminate\Foundation\Application;
use App\Http\Controllers\AssetController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\StoreRoomController;

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
    return Inertia::render('Auth/Login', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::post('/dashboard', [EmployeeController::class, 'createEmployee'])->middleware(['auth', 'verified'])->name('createEmployee');
Route::get('/dashboard', [EmployeeController::class, 'fetchEmployee'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/assets', function () {
    return Inertia::render('Assets');
})->middleware(['auth', 'verified'])->name('assets');

Route::get('/assets', [EmployeeInformationController::class, 'fetchAsset'])->middleware(['auth', 'verified'])->name('assets');

Route::post('/assets', [EmployeeInformationController::class, 'createAsset'])->middleware(['auth', 'verified'])->name('createAsset');

Route::get('/employee/{id}', [EmployeeInformationController::class, 'index'])->middleware(['auth', 'verified'])->name('getEmployeeInformation');

Route::get('/delete/asset/{id}', [EmployeeInformationController::class, 'deleteAsset'])->middleware(['auth', 'verified'])->name('deleteAsset');

Route::get('/employee/delete/{id}', [EmployeeInformationController::class, 'deleteEmployee'])->middleware(['auth', 'verified'])->name('deleteEmployee');
Route::get('/storeAsset/{id}', [EmployeeInformationController::class, 'storeAsset'])->middleware(['auth', 'verified'])->name('storeAsset');

Route::get('/storage', [StoreRoomController::class, 'fetchStoreRoomAssets'])->middleware(['auth', 'verified'])->name('storeroom');






require __DIR__.'/auth.php';
