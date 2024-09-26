<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
            'start_time' => 'required|date_format:Y/m/d H:i',
            'end_time' => 'required|date_format:Y/m/d H:i',
            'status' => 'required',
        ];
    }

    /**
     *  バリデーション項目名定義
     * @return array
     */
    public function attributes()
    {
        return [
            'start_time' => '予約開始時間',
            'end_time' => '予約終了時間',
            'status' => '予約状況',
        ];
    }

    /**
     * バリデーションメッセージ
     * @return array
     */
    public function messages() {
        return [
            'start_time.required' => ':attributeは必須項目です。',
            'end_time.required' => ':attributeは必須項目です。',
            'status.required' => ':attributeは必須項目です。',
            'start_time.date_format' => ':attribute の形式が正しくありません。',
            'end_time.date_format' => ':attribute の形式が正しくありません。',
        ];
    }
}
