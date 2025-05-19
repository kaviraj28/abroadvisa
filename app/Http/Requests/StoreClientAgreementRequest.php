<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientAgreementRequest extends FormRequest
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
            'cname' => 'required',
            'caddress' => 'required',
            'cnumber' => 'required',
            'cmail' => 'required',
            'cpan' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'designation' => 'required',
            'status' => 'required',
        ];
    }
}
