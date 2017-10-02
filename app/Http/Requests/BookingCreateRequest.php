<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class BookingCreateRequest extends FormRequest
{
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
            'bookings' => 'required|array',
        ];
    }
}
