<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'learning_language' => 'required',
            'experience_level' => 'required',
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
            'learning_language' => 'プログラミング言語',
            'experience_level' => '経験レベル',
        ];
    }

    /**
     * バリデーションメッセージ
     * @return array
     */
    public function messages() {
        return [
            'name.required' => ':attributeは必須項目です。',
            'learning_language.required' => ':attributeは必須項目です。',
            'experience_level.required' => ':attributeは必須項目です。',
        ];
    }
}
