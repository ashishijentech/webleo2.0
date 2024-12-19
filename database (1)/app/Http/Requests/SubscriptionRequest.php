<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscriptionRequest extends FormRequest
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
            // 'PackageType' => 'required',
            // 'PackageName' => 'required',
            // 'BillingCycle' => 'required',
            'Description' => 'required',
            // 'Price' => 'required',
            // 'Renewalcheckbox' => 'required',
        ];
    }
}
