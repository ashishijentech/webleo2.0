<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DistributorsOnboardRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            // 'name' => 'required | regex:/^[a-zA-Z0-9\s]+$/',
            // 'email' => 'required|email',
            // 'business_name' => 'required | regex:/^[a-zA-Z0-9\s]+$/',
            // 'gender' => 'required',
            // 'mobile' => 'required | regex:/^[6-9]\d{9}$/',
            // 'date_of_birth' => 'required | date',
            // 'map_device_edit' => 'required | regex:/^[a-zA-Z0-9\s]+$/',
            // 'pan_number' => 'required | regex:/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/',
            // 'occupation' => 'required | regex:/^[a-zA-Z0-9\s]+$/',
            // 'advance_payment' => 'required',
            // 'language_known' => 'required',
            // 'country' => 'required',
            // 'state' => 'required',
            // 'rto_devision' => 'required',
            // 'district' => 'required',
            // 'pincode' => 'required',
            // 'area' => 'required',
            // 'address' => 'required',
        ];
    }
}