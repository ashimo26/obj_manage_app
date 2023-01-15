<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiscardRequest extends FormRequest
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
            'item' => ['required', 'string', 'max:30'],
            'favorite' => ['required'],
            'kachi_option' => ['required']
        ];
    }

    public function message()
    {
        return[
            'item.required' => 'アイテム名を記入してください',
            'item.max' => 'アイテム名は30文字以内で入力してください',
            'kachi_option.required' => '価値観を選んでください'
        ];
    }
}
