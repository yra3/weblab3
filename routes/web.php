<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaceController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/places', [PlaceController::class, 'index']);
Route::get('/places/create', [PlaceController::class, 'create']);
Route::post('/places', [PlaceController::class, 'store']);
Route::get('/places/{place}', [PlaceController::class, 'show']);
Route::get('/places/{place}/edit', [PlaceController::class, 'edit']);
Route::put('/places/{place}', [PlaceController::class, 'update']);
Route::patch('/places/{place}', [PlaceController::class, 'update']);
Route::delete('/places/{place}', [PlaceController::class, 'destroy']); 

require __DIR__.'/auth.php';
