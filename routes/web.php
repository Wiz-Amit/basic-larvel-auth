<?php

use App\Http\Controllers\UserController;
use App\Models\User;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $usersCount = User::count();
        $newRegisters = User::query()->monthly()->count();
        return view('dashboard', compact("usersCount", 'newRegisters'));
    })->name('dashboard');

    Route::resource('users', UserController::class);
});


require __DIR__ . '/auth.php';
