<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MypageRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'kachi' => 'required|max:255'
        ];
    }

    public function message()
    {
        return[
            'kachi.required' => '記入してください',
            'kachi.max' => '255文字以内で入力してください',
        ];
    }
}
