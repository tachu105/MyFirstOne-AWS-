<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'post.title' => 'required|string|max:100',
            'post.body' => 'required|string|max:4000',
        ];
        /**
         * 書式：'キー名' => 'ルール1|ルール2|ルール3'
            キー名はHTML上Formのname属性。
            post[title]など入れ子になっている場合は.（ドット）で繋ぎます。
            ルールが複数ある場合は|（パイプ）で繋げて記載します。
            ルールは左側から評価され、エラーがあった段階で返却されます
         */
    }
}
