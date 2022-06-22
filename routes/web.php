<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CocoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\test\TestController;
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
// Route::get('/test', [TestController::class, 'index']);
// Route::post('/test', [TestController::class, 'getAjax']);

Route::prefix('/article')->group(function(){
    Route::get('/', [CocoController::class, 'index']);
    $categorys=CocoCategoryModel::where('status', '=', 1)->get();
    foreach ($categorys as $key => $category){
        //顯示分類底下的全部文章
        Route::get('/'.$category->url, [CocoController::class, 'category_article'])->name($category->id);

        Route::get('/'.$category->url.'/'.'{id}', [CocoController::class, 'article_info'])->name($category->id);
    }


});