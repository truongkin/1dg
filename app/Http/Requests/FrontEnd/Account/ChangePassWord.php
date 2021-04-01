<?php

namespace App\Http\Requests\FrontEnd\Account;

use Illuminate\Foundation\Http\FormRequest;

class ChangePassWord extends FormRequest
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
    public function rules()
    {
        return [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }
    public function messages()
{
    return [
        'password.required' => trans('message.Mật khẩu không được để trống'),
        'password.min' =>trans('message.Mật khẩu dài hơn 8 kí tự'),
        'password.confirmed' => trans('message.Mật khẩu không trùng khớp'),
    ];
}
}
