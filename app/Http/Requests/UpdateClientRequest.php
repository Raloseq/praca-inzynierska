<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateClientRequest extends FormRequest
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
            'phone' => ['required','string','numeric',Rule::unique('clients')->ignore($this->client->id)],
            'email' => ['required','email',Rule::unique('clients')->ignore($this->client->id)],
            'NIP' => ['nullable','string','digits:10','numeric',Rule::unique('clients')->ignore($this->client->id)],
            'comapny_name' => ['nullable','string','max:30',Rule::unique('clients')->ignore($this->client->id)]
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
            'email.unique' => 'Podany emial już widnieje w bazie',
            'NIP.digits' => 'NIP powinieni zawierać 10 cyfr',
            'NIP.numeric' => 'NIP nie powinien posiadać liter w sobie',
            'NIP.unique' => 'Podany NIP już widnieje w bazie',
            'comapny_name.max' => 'Nazwa firmy jest za długa',
            'comapny_name.unique' => 'Podana nazwa firmy już widnieje w bazie',
            'email.email' => 'Podany email jest błędny'
        ];
    }
}
