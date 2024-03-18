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
     * Post $postの引数名はweb.php(viewクラス)のURLの{}内の名前と同じにする
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
        
        return redirect('/posts/' . $post->id); //redirectはlaravelの関数
        /**
         * save()関数が実行された時点で$postには追加したIDが追加される
         * idには新たに作成したDBのid番号が保持される？
         */
    }
    
    /**
     * 記事更新ボタンが押されたときの挙動
     */
    public function update(PostRequest $request, Post $post)//ROute::putでURLの記事番号を指定しているので，更新したい記事のクラスインスタンスのみが送られてくる
    {
        $input_post = $request['post'];//postはedit.bladeのnameの部分の名前
        $post->fill($input_post)->save();
    
        return redirect('/posts/' . $post->id);
    }
    
    
    /**
     * 編集画面呼び出し
     */
    public function edit(Post $post)//ここはURLで指定している記事番号のインスタンスが代入される
    {
        return view('posts.edit')->with(['post' => $post]);
    }


     /**
      * この引数$postはルートパラメータのデータと暗黙的に結合されるため，
      * ルートパラメータで指定したidのインスタンスのみが代入される
      */
    public function show(Post $post){
        return view('posts.show')->with(['post' => $post]);
    }
}
