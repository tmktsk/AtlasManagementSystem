<?php

namespace App\Http\Requests\BulletinBoard;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 'post_category_id' => 'required|exists:sub_categories.id',
            'post_title' => 'required|string|min:4|max:100',
            'post_body' => 'required|string|min:10|max:5000',
        ];
    }

    public function messages(){
        return [
            'required' => '必須項目です。',
            'exists' => 'サブカテゴリーに存在しません。',
            'string' => '文字列で入力して下さい。',
            'post_title.required' => 'タイトルは必ず入力してください。',
            'post_title.min' => 'タイトルは4文字以上入力してください。',
            'post_title.max' => 'タイトルは100文字以内で入力してください。',
            'post_body.required' => '投稿内容は必ず入力してください。',
            'post_body' => '投稿内容は必ず入力してください。',
            'post_body.min' => '内容は10文字以上入力してください。',
            'post_body.max' => '最大文字数は5000文字です。',
        ];
    }
}
