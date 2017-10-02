<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
use Illuminate\Contracts\Validation\Validator;

class BookingCreateRequest extends FormRequest
{

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        echo "<b>Validation failed</b><br>";
        echo "<hr>";
        print_r(json_encode($validator->errors()));
        echo "<hr>";
        die;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $purchaser = Auth::user();
        return $purchaser && $purchaser->user_type_id = 1;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'carer_id' => 'required',
            'service_user_id' => 'required',
            'bookings.*.assistance_types' => 'required',
            'bookings.*.appointments.*.date_start' => 'required',
            'bookings.*.appointments.*.time_from' => 'required',
            'bookings.*.appointments.*.time_to' => 'required',
        ];
    }
}
