<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        //ページネーションとは、ECサイトの商品件数や掲示板のコメントなど件数が多い場合に、一気に表示させるのではなく、ページ遷移を行うことで数件〜数十件ずつ取得していく手法のこと
        //laravel8以降はデフォルトがtailwindcssになっているので、bootstrapを使えるように変更する．
    }
}
