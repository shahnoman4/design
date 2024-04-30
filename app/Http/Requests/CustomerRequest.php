<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'suffix' => 'required',
            'company_name' => 'required',
            'customer_display_name' => 'required',
            'email' => 'required|email',
            'phone_no' => 'required',
            'mobile_no' => 'required',
            'fax' => 'required',
            'website' => 'required',
           // 'is_sub_customer' => 'required',
            'notes' => 'required',
            'attachment' => 'required',
           // 'payment_method_id' => 'required',
            'payment_terms' => 'required',
           // 'sales_delivery_option' => 'required',
           // 'use_language' => 'required',
           // 'vat_reg_no' => 'required',
           // 'utr_no' => 'required',
            'opening_no' => 'required',
            'ask_of_date' => 'required',
        ];
    }
}
