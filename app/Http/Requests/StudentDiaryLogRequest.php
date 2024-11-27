<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentDiaryLogRequest extends FormRequest
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
            'content' => 'required',
        ];
    }

    /**
     *  バリデーション項目名定義
     * @return array
     */
    public function attributes()
    {
        return [
            'content' => '生徒日報',
        ];
    }

    /**
     * バリデーションメッセージ
     * @return array
     */
    public function messages() {
        return [
            'content.required' => ':attributeは必須項目です。',
        ];
    }
}