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
        return [
          'over_name' => 'required|string|max:10',
          'under_name' => 'required|string|max:10',
          'over_name_kana' => 'required|string|regex:/\A[ア-ンー]+\z/u|max:30',
          'under_name_kana' => 'required|string|regex:/\A[ア-ンー]+\z/u|max:30',
          'mail_address' => 'required|email|unique:users|max:100',
          'sex' => 'required|in:1,2,3|',
          // 'old_year' => 'required|integer|between:2000, date('Y')|valid_date:birth_year,birth_month,birth_day',
          'old_year' => 'required|after_or_equal:2000|lte:'.date('Y'),
          'old_month' => 'required|between:01,12',
          'old_day' => 'required|between:01,31',
          // 'birthdate' => 'required|date_format:Y-m-d',
          'role' => 'required|in:1,2,3,4|',
          'password' => 'required|min:8|max:30|confirmed',
          'password_confirmation' => 'required|same:password',
        ];
    }

    public function messages(){
        return [
        'required' => '必須項目です。',
        'over_name.max' => '10文字以下で入力して下さい。',
        'under_name.max' => '10文字以下で入力して下さい。',
        'regex' => 'カタカナで入力して下さい。',
        'mail_address.email' => 'メール形式で入力して下さい。',
        'mail_address.unique' => '既に存在するメールアドレスです。',
        'mail_address.max' => '100文字以内で入力して下さい。',
        'sex.in' => '3つの項目から選択してください。',
        'after_or_equal' => '2000年以降で入力して下さい。',
        'lte' => '今年よりも前の年を入力して下さい。',
        'old_month' => '1~12のうちから選択して下さい。',
        'old_day' => '1~31のうちから選択して下さい。',
        'role.in' => '4つの項目から選択して下さい。',
        'min:8' => '8文字以上で入力して下さい。',
        'max:30' => '30文字以内で入力して下さい。',
        'confirmed' => '確認用パスワードと一致していません。',
        'same' => 'パスワードと一致しません。',
        ];
    }
}
