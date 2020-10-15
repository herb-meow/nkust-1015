<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoPlayController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
$username = "Guest";
if (Auth::check()) {
    $user = Auth::user();
    $username = $user->name;
}
Route::get('/', [VideoPlayController::class, 'index']);
Route::get('/logout/', [VideoPlayController::class, 'logout']);
Route::post('/addlist/', [VideoPlayController::class, 'addlist']);
Route::get('/delete/{id}/', [VideoPlayController::class, 'delete']);
Route::get('/showlist/{id}/', [VideoPlayController::class, 'showlist']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    global $username;
    return view('dashboard', compact('username'));
})->name('dashboard');
