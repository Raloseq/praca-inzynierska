<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
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
            'name' => 'required|string|max:30',
            'surname' => 'required|string|max:30',
            'phone' => 'required|string|digits:9|numeric|unique:clients',
            'email' => 'required|email:rfc,dns|unique:clients',
            'NIP' => 'nullable|string|digits:10|numeric|unique:clients',
            'comapny_name' => 'nullable|string|max:30|unique:clients'
        ];
    }

    public function messages()
    {
        return [
            'phone.numeric' => 'Telefon powinien zawierać tylko cyfry'
        ];
    }
}
