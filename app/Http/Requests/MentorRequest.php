<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MentorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
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
            'teaching_languages.required' => ':attributeは必須項目です。',
            'experience_years.required' => ':attributeは必須項目です。',
        ];
    }
}

