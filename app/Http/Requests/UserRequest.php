<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    /**
     * バリデーションルール
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
            'learning_language' => 'required',
            'experience_level' => 'required',
            'teaching_languages' => 'required',
            'experience_years' => 'required|integer',
        ];
    }

    /**
     *  バリデーション項目名定義
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => '氏名',
            'email' => 'メールアドレス',
            'password' => 'パスワード',
            'role' => '役割',
            'learning_language' => 'プログラミング言語',
            'experience_level' => '経験レベル',
            'teaching_languages' => 'プログラミング言語',
            'experience_years' => '経験年数',
        ];
    }

    /**
     * バリデーションメッセージ
     * @return array
     */
    public function messages() {
        return [
            'name.required' => ':attributeは必須項目です。',
            'email.required' => ':attributeは必須項目です。',
            'password.required' => ':attributeは必須項目です。',
            'role.required' => ':attributeは必須項目です。',
            'learning_language.required' => ':attributeは必須項目です。',
            'experience_level.required' => ':attributeは必須項目です。',
            'teaching_languages.required' => ':attributeは必須項目です。',
            'experience_years.required' => ':attributeは必須項目です。',
        ];
    }
}
