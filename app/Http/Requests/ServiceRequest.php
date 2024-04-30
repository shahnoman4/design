<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'service_type' => 'required',
            'name' => 'required',
            'service_code' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'sales_price' => 'required',
            'account_type_id' => 'required',
            'inclusive_of_vat' => 'required',
            'vat' => 'required',
            'image' => 'required',
            'purchasing_information' => 'required',
            // 'purchase_description' => 'required',
            // 'cost' => 'required',
            // 'expense_account_id' => 'required',
            // 'inclusive_tax' => 'required',
            // 'purchase_tax' => 'required',
            // 'supplier_id' => 'required',
        ];
    }
}
