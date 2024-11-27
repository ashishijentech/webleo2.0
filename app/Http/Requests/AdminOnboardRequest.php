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
            'name_of_the_business' => 'required',
            'email' => 'required',
            'regd_address' => 'required',
            'gstin_no' => 'required',
            'pan_no' => 'required',
            'contact_no' => 'required',
            'gst_certificate' => 'required',
            'pan_card' => 'required',
            'incorporation_certificate' => 'required',
        ];
    }
}
