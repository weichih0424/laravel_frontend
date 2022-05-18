<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\coco\CocoController;
use App\Http\Controllers\coco\HomeController;
use App\Http\Controllers\TestController;
use App\Models\CocoCategoryModel;

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
// Route::get('/', [CocoController::class, 'index']);
Route::get('/', [HomeController::class, 'index']);
Route::get('/test', [TestController::class, 'index']);

// dd($categorys);
Route::prefix('/article')->group(function(){
    Route::get('/', [CocoController::class, 'index']);
    // Route::get('/{category_url}', [CocoController::class, 'category_article']);
    $categorys=CocoCategoryModel::where('status', '=', 1)->get();
        foreach ($categorys as $key => $category){
            // Route::get('/'.$category->url, [CocoController::class, 'category_article']);
            Route::post('/'.$category->url, [CocoController::class, 'category_article']);
            // $category_url = $category->url;
            // Route::resource('/food', HomeController::class);
            // Route::resource('/drink', HomeController::class);
            // Route::resource('/sport', HomeController::class);
        }
    });