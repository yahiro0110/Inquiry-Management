<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'first_name' => ['required', 'max:32'],
            'last_name' => ['required', 'max:32'],
            'email' => ['required', 'email'],
            'postal' => ['required'],
            'address' => ['required', 'max:64'],
            'building_name' => ['max:64'],
            'opinion' => ['required', 'max:120']
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => '値が入力されていません',
            'last_name.required' => '値が入力されていません',
            'first_name.max' => '入力できる文字数（32文字まで）を超えています',
            'last_name.max' => '入力できる文字数（32文字まで）を超えています',
            'email.required' => '値が入力されていません',
            'email.email' => '無効なメールアドレスです',
            'postal.required' => '値が入力されていません',
            'address.required' => '値が入力されていません',
            'address.max' => '入力できる文字数（64文字まで）を超えています',
            'building_name.max' => '入力できる文字数（64文字まで）を超えています',
            'opinion.required' => '値が入力されていません',
            'opinion.max' => '入力できる文字数（120文字まで）を超えています'
        ];
    }
}
