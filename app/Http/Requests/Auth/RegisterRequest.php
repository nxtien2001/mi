<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|max:50',
            'password' => 'required|min:5|max:50|confirmed',
            'email' => 'required|email|unique:users,email',
            'password_confirmation' => 'required|min:5|max:50'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Không được để trống trường này!',
            'name.max' => 'Tên không được quá 50 kí tự',
            'password.required' => 'Không được để trống trường này!',
            'password.min' => 'Mật khẩu phải từ 5-15 kí tự',
            'password.max' => 'Mật khẩu phải từ 5-15 kí tự',
            'password_confirmation' => 'Mật khẩu chưa khớp',
            'email.required' => 'Không được để trống trường này!',
            'email.unique' => 'Email đã tồn tại',
            'email.email' => 'Email không đúng định dạng',
            'password_confirmation.required' => 'Không được để trống trường này!',
            'password_confirmation.min' => 'Mật khẩu phải từ 5-15 kí tự',
            'password_confirmation.max' => 'Mật khẩu phải từ 5-15 kí tự',
        ];
    }
}
