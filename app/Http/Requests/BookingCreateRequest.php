<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class BookingCreateRequest extends FormRequest
{

    /**
     * Get the proper failed validation response for the request.
     *
     * @param  array  $errors
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function response(array $errors)
    {
        if ($this->expectsJson()) {
            return new JsonResponse($errors, 200);
        }

        return $this->redirector->to($this->getRedirectUrl())
            ->withInput($this->except($this->dontFlash))
            ->withErrors($errors, $this->errorBag);
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
