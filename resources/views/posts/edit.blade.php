<!-- body内だけを表示しています。 -->
<body>
    <h1 class="title">編集画面</h1>
    <div class="content">
        <form action="/posts/{{ $post->id }}" method="POST">
            @csrf {{--クロスサイトリクエストフォージェリ（CSRF）攻撃から保護するためのトークンを生成するLaravelのディレクティブ--}}
            @method('PUT'){{--HTMLフォームは、基本的にはGETとPOSTリクエストのみなので，Laravel特有の@method'PUT'ディレクティブを使用--}}
            <div class='content__title'>
                <h2>タイトル</h2>
                <input type='text' name='post[title]' value="{{ $post->title }}">
            </div>
            <div class='content__body'>
                <h2>本文</h2>
                <input type='text' name='post[body]' value="{{ $post->body }}">
            </div>
            <input type="submit" value="保存">{{--submitにすることでformで指定しているようにPOSTリクエストが送られる--}}
        </form>
    </div>
</body>