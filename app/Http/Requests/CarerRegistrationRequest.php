<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarerRegistrationRequest extends FormRequest
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
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'referal_code'=>'string|nullable|max:128',

            'title' => 'required|numeric:1',
            'first_name' => 'required|string|max:128',
            'family_name' => 'required|string|max:128',
            'like_name' => 'required|string|max:128',
            'gender' => 'required|string|max:14',
            'mobile_number' => 'required',
            'address_line1'=>'required|string|max:256',
            'address_line2' => 'nullable|string|max:256',
            'town' => 'required|string|max:128',
            'postcode_id' => 'required|integer',
            'DoB'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'A fields is required',
            'password.required'  => 'A fields is required',


            'title.required' => 'A fields is required',
            'first_name.required'  => 'A fields is required',
            'family_name.required' => 'A fields is required',
            'like_name.required'  => 'A fields is required',
            'gender.required'  => 'A fields is required',
            'mobile_number.required' => 'A fields is required',
            'address_line1.required'  => 'A fields is required',
            'town.required'  => 'A fields is required',
            'postcode_id.required' => 'A fields is required',
            'DoB.required'  => 'A fields is required',

        ];
    }
}
