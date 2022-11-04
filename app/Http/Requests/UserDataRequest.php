<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserDataRequest extends FormRequest
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
            'city' => 'string|required',
            'street' => 'string|required',
            'ZIP' => 'required|regex:/\b\d{5}\b/',
            'NIP' => 'nullable|string|digits:10|unique:users|numeric',
            'comapny_name' => 'nullable|string|unique:users|max:30'
        ];
    }

    public function messages()
    {
        return [
            'NIP.digits' => 'NIP powinieni zawierać 10 cyfr',
            'NIP.numeric' => 'NIP nie powinien posiadać liter w sobie',
            'NIP.unique' => 'Podany NIP już widnieje w bazie',
            'comapny_name.max' => 'Nazwa firmy jest za długa',
            'comapny_name.unique' => 'Podana nazwa firmy już widnieje w bazie',
        ];
    }
}
