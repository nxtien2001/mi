<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'oldpassword' => 'required',
            'password' => 'required|min:5|max:15|confirmed',
            'password_confirmation' => 'required|min:5|max:15',
        ];
    }
    public function messages()
    {
        return [
            'oldpassword.required' => 'Không được để trống trường này!',
            'password.required' => 'Không được để trống trường này!',
            'password.min' => 'Mật khẩu phải từ 5-15 kí tự',
            'password.max' => 'Mật khẩu phải từ 5-15 kí tự',
            'password.confirmed' => 'Mật khẩu chưa khớp',
            'password_confirmation.required' => 'Không được để trống trường này!',
            'password_confirmation.min' => 'Mật khẩu phải từ 5-15 kí tự',
            'password_confirmation.max' => 'Mật khẩu phải từ 5-15 kí tự',
        ];
    }
}
