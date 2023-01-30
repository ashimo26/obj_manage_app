<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Services\validationService;

class WantBuyListRequest extends FormRequest
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
            'list_name' => 'required|max:30'
        ];
    }

    public function message()
    {
        return[
            'list_name.required' =>'記入してください',
            'list_name.max' => '30文字以内で入力してください'
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator){
            //他のバリデーションルールでエラーが出たら何もせず返す
            if(count($this->validator->errors()) != 0){
                return;
            }
            // 処理クラスへ入力値を渡す
            $errors = validationService::nameCheckForBuy($this->all());
            foreach((array)$errors as $error){
                // エラーメッセージを生成
                $validator->errors()->add($error['key'], $error['message']);
            }
        });
    }
}
