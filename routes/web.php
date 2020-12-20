<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SiteController;

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
    return redirect()->route('login');
})->name('welcome');


Route::get('/home', [MessageController::class, 'home'])->middleware(['auth'])->name('home');

Route::get('/dashboard', [MessageController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

Route::get('/messages', [MessageController::class, 'messages'])->middleware(['auth'])->name('messages');

Route::get('/addmessage', [MessageController::class, 'form'])->middleware(['auth'])->name('addmessage');
Route::post('/addmessage', [MessageController::class, 'create'])->middleware(['auth'])->name('addmessage');;

require __DIR__.'/auth.php';

Auth::routes();

