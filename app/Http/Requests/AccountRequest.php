<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
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
            'detail_type' => 'required',
            'detail_description' => 'required',
            'name' => 'required',
            'number' => 'required',
            'description' => 'required',
            'is_sub_account' => 'required',
            'parent_id' => 'required',
            'vat_code' => 'required',
        ];
    }
}
