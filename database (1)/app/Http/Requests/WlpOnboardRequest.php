<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WlpOnboardRequest extends FormRequest
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
            'country' => 'required',
            'state' => 'required',
            'mobile_no' => 'required',
            'parent_name' => 'required',
            'parent_code' => 'required',
            'website' => 'required',
            'web_url' => 'required',
            'logo' => 'required | image | mimes:jpg,jpeg,png',
            'address' => 'required',
            'sales_mobile_no' => 'required | regex:/^[6-9]\d{9}$/',
            'landline_no' =>  'required',
            'email_id' => 'required | email',
            'smart_parent_app_package' => 'required',
            'show_powered_by' => 'required',
            'power_by' => 'required',
            'account_limit' => 'required',
            'http_sms_url' => 'required',
            'http_sms__gateway_method' => 'required',
            'gstn_no' => 'required | regex:/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[A-Z0-9]{1}Z[A-Z0-9]{1}$/',
            'billing_email' => 'required | email',
            'isallowthirdpartyapi' => 'required',


        ];
    }
}
