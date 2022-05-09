<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\coco\CocoController;

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
Route::get('/', [CocoController::class, 'index']);
Route::prefix('home')->group(function(){
    Route::get('/title' ,[CocoController::class, 'index']);
});