<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            //
            'first_name'=> 'required',
            'last_name'=> 'required',
            'email' => 'required|email|unique:user_registers',
            'gender'=> 'required',
            'region'=> 'required',
            'phone' => 'required|integer|digits:10',
        ];
    }
    public function messages()
    {
        return [
            'first_name.required' => 'The first name is required',
            'last_name.required' => 'The last name is required',
            'email.required' => 'The email is required',
            'gender.required' => 'The gender is required',
            'region.required' => 'The last name is required',
            'phone.required' => 'The last name is required',

        ];
    }

}
