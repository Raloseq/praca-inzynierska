<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeStoreRequest extends FormRequest
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
            'name' => 'required|string|max:30|alpha',
            'surname' => 'required|string|max:30|alpha',
            'phone' => 'required|string|unique:employee|numeric',
            'salary' => 'required|min:2000|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Podaj imie',
            'name.string' => 'Imie musi posiadać tylko znaki',
            'name.max' => 'Imie jest za długie',
            'name.alpha' => 'Imie musi składać się tylko ze znaków',
            'surname.required' => 'Podaj nazwisko',
            'surname.string' => 'Nazwisko musi posiadać tylko znaki',
            'surname.max' => 'Nazwisko jest za duże',
            'surname.alpha' => 'Nazwisko musi składać się tylko ze znaków',
            'phone.numeric' => 'Telefon powinien zawierać tylko cyfry',
            'phone.required' => 'Podaj numer telefonu',
            'phone.unique' => 'Podany numer już widnieje w bazie',
            'salary.min' => 'Wartość musi być większa niż 2000',
            'salary.numeric' => 'Wartość musi posiadać same cyfry'
        ];
    }
}
