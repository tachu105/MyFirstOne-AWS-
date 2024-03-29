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


Route::get('/', [PostController::class, 'index']);
/**
 * /postsにアクセスした際に呼び出すメソッドを登録している．
 * Route::get()はURLとメソッドを紐付けるための関数．AddListenerのようなもの
 * 今回は'/posts'というリンクとPostControllerのindexメソッドを結び付けている
 * 
 * ちなみにここではRouteクラスはインスタンスを生成せずに，static関数かのように呼び出すことができている．
 * これはlaravelのファサードという機能でいわゆるDIコンテナ
 * Unityのzenjectとは若干仕様が異なるらしく，神様が自動的にインスタンスを生成してくれるので，
 * 静的メソッドのように呼び出すことができる機能らしい
 * 
 * PostController::classは完全修飾名（クラスへのフルリンク：App\Http\Controllers\PostController）を文字列として返す書き方
 * なので，上でuseをせずに
 * Route::get('/posts', [App\Http\Controllers\PostController, 'index']);
 * でもよい
 * ちなみに[]なのは，引数が配列で指定されているため
 * stringの配列を引数として渡してる感じかな
 */
 
 /**
  * 新たな投稿の作成後に呼び出されるリンク
  */
 Route::post('/posts', [PostController::class, 'store']);
      
 /**
  * 新たな投稿を作成するページの呼び出し
  * ルートパラメータの呼び出しより上に記述する
  */
 Route::get('/posts/create', [PostController::class, 'create']);
 
 
 /**
  * 投稿の編集用URL取得時の呼び出し
  */
 Route::get('/posts/{post}/edit', [PostController::class, 'edit']);
     
 
 /**
  * 各投稿ページの表示関数呼び出し
  */
 Route::get('/posts/{post}', [PostController::class, 'show']);
 /**
  * {}内のルートパラメータは，show関数の引数と同じ名前にする
  * そうすることで暗黙的に結合することができる
  */
  
  /**
   * 更新処理をする関数の呼び出し
   */
  Route::put('/posts/{post}', [PostController::class, 'update']);
 ?>