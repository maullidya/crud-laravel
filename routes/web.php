<?php

use App\Http\Controllers\masyarakatController;
use App\Http\Controllers\petugasController;
use App\Http\Controllers\pengaduanController;
use App\Http\Controllers\tanggapanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;

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


Route ::resource ('masyarakat', masyarakatController::class);
Route ::resource ('petugas', petugasController::class);
Route ::resource ('pengaduan', pengaduanController::class);
Route ::resource ('tanggapan', tanggapanController::class);
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');



Route::group(['middleware' => ['web']], function () {
    // Your routes or controllers here
});
Route ::get('/login', [AuthManager::class, 'login'])->name('login');
Route ::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');
Route ::get('/registration', [AuthManager::class, 'registration'])->name('registration');
Route ::post('/registration', [AuthManager::class, 'registrationPost'])->name('registration.post');
Route ::get('/logout', [AuthManager::class, 'logout'])->name('logout');
