<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::get('/posts', [PostController::class, 'index']);
/**
 * /postsにアクセスした際にPostControllerのindexメソッドを呼び出す
 */
// Route::get('/posts', function (Request $request) {
//     return PostController::index();
// });
//意味合い的にはこんな感じ（これだとダメ）だけど，さっきのを使うとLaravalが必要なパラメータとかを
//自動で渡してくれるので，手動で明記しなくても良く，ミスが減るため，こっちを使うことが推奨．



