<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::get('/usercontrol', [UserController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('usercontrol');

Route::get('/users/{user}/edit', [UserController::class, 'edit'])
    ->middleware(['auth', 'verified'])
    ->name('useredit');

Route::get('/users/{user}/delete', [UserController::class, 'delete'])
    ->middleware(['auth', 'verified'])
    ->name('userdelete');

Route::put('/users/{user}', [UserController::class, 'update'])
    ->middleware(['auth', 'verified'])
    ->name('userupdate');

Route::get('/users/create', [UserController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('usercreate');

Route::post('/users', [UserController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('userstore');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

