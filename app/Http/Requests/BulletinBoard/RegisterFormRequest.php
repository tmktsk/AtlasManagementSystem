<?php

namespace App\Http\Requests\BulletinBoard;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
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
    public function prepareForvalidation(){
      $birthdate = $this->input('old_year') . '-' . $this->input('old_month') . '-' . $this->input('old_day');
      $this->merge([
        'birthdate' => $birthdate,
      ]);
    }

    public function rules(){
        // $check = $this->input('old_month');
        // dd($check);
        return [
          'over_name' => 'required|string|max:10',
          'under_name' => 'required|string|max:10',
          'over_name_kana' => 'required|string|regex:/\A[ア-ンー]+\z/u|max:30',
          'under_name_kana' => 'required|string|regex:/\A[ア-ンー]+\z/u|max:30',
          'mail_address' => 'required|email|unique:users|max:100',
          'sex' => 'required|in:1,2,3|',
          'old_year' => 'required|integer|between:2000,' . date('Y'),
          'old_month' => 'required|between:01,12',
          'old_day' => 'required|between:01,31',
          'birthdate' => 'required|date_format:Y-m-d',
        ];
    }

    public function messages(){
        return [
        'over_name.max' => '10文字以下で入力して下さい。',
        'mail_address.email' => 'メール形式で入力してください。',
        // 'birthdate.date_format' => '正しい日付にしてください。',
        // 'old_month.between' => '1~12じゃない。',
        // 'old_day.between' => '1~31じゃない。'

        ];
    }
}
