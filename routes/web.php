<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AddUserController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/register', function () {
    return view('auth.register');
});

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/',  [DashboardController::class, 'index']);  
Route::get('/grandpa_child/{grandpa_id}',  [DashboardController::class, 'grandpaChild']);
Route::post('search', [DashboardController::class, 'search'])->name('search'); 

Route::get('/userdetails',  [AddUserController::class, 'grandpa']); 
Route::post('/add-user',  [AddUserController::class, 'store'])->name('post.add.user');






Route::middleware(['auth:api'])->group(function () {    
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    // Route::get('/user-profile', [AuthController::class, 'userProfile']);
});