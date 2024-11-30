<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminOnboardRequest extends FormRequest
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
            'name_of_the_business' => 'required|regex:/^[a-zA-Z0-9\s]+$/',
            'email' => 'required|email',
            'regd_address' => 'required',
            'gstin_no' => 'required | regex:/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[A-Z0-9]{1}Z[A-Z0-9]{1}$/',
            'pan_no' => 'required|regex:/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/',
            'contact_no' => 'required | regex:/^[6-9]\d{9}$/',

            'gst_certificate' => 'required | file | mimes:pdf',
            'pan_card' => 'required | file | mimes:pdf',
            'incorporation_certificate' => 'required | file | mimes:pdf',
            'company_logo' => 'required | file | mimes:jpg,jpeg,png',
        ];
    }
}