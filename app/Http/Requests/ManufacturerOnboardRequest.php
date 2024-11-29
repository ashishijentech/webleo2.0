<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManufacturerOnboardRequest extends FormRequest
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
            'manufacturer_name' => 'required',
            'email' => 'required|email',
            'parent_name' => 'required',
            'country' => 'required',
            'state' => 'required',
            'manufacturer_code' => 'required',
            'business_name' => 'required | regex:/^[a-zA-Z0-9\s]+$/',
            'gst_number' => 'required | regex:/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[A-Z0-9]{1}Z[A-Z0-9]{1}$/',
            'mobile_no' => 'required | regex:/^[6-9]\d{9}$/',
            'address' => 'required',
            'logo' => 'required | image | mimes:jpg,jpeg,png',
        ];
    }
}
