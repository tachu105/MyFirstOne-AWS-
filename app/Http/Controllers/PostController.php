<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Post一覧を表示する
     * @param Post Postモデル
     * @return array Postモデルリスト
     */
    public function index(Post $post){
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);
    }
    /**
     *$postへの代入はDIコンテナが，自動的に最適なデータを依存注入してくれる．
     * ちなみにphpでは基本的に変数型を明示できない．
     * ただし引数と戻り値は明示することが可能
     * 
     * function sum(float $a, float $b): float {
     *      return $a + $b;
     * }
     * 
     * withの部分は，bladeファイルにおいて，postsという変数名で，get()関数で生成したPostクラスのインスタンスを使用できるようにしている
     */
     
     
     /**
      * この引数$postはルートパラメータのデータと暗黙的に結合されるため，
      * ルートパラメータで指定したidのインスタンスのみが代入される
      */
    public function show(Post $post){
        return view('posts.show')->with(['post' => $post]);
    }
}
