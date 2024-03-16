<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
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
     
     
     public function create()
    {
        return view('posts.create');
    }
    
    /**
     * Requestはユーザーからのリクエストデータなどが含まれるインスタンス？
     * 
     */
    public function store(Post $post, PostRequest $request)
    {
        $input = $request['post'];  //postはcreate.bladeのnameの部分の名前
        $post->fill($input)->save();
        /**
         * $post->title = $input["title"];
         * $post->body = $input["body"];
         * $post->save();
         * を自動で行ってくれるのがfill関数
         * ただし，Modelクラスにfillable関数を作って，自動代入ができるパラメータを設定しておく必要がある．
         * 
         * ちなみに，fill($input)->save()
         * をまとめたcreate($input)という関数もある
         */
        
        return redirect('/posts/' . $post->id);
        /**
         * save()関数が実行された時点で$postには追加したIDが追加される
         * idには新たに作成したDBのid番号が保持される？
         */
    }


     /**
      * この引数$postはルートパラメータのデータと暗黙的に結合されるため，
      * ルートパラメータで指定したidのインスタンスのみが代入される
      */
    public function show(Post $post){
        return view('posts.show')->with(['post' => $post]);
    }
}
