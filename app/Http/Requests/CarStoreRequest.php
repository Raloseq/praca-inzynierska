<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarStoreRequest extends FormRequest
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
            'VIN' => 'required|digits:17',
            'registration_number' => 'required|min:5|max:7',
            'year' => 'date',
            'photo' => 'image'
        ];
    }

    public function messages()
    {
        return [
            'VIN.digits' => 'VIN musi zawierać 17 znaków',
            'registration_number.min' => 'Numer rejestracyjny musi posiadać minimum 5 znaków',
            'registration_number.max' => 'Numer rejestracyjny musi posiadać maksymalnie 7 znaków',
            'photo.image' => 'Przesłany plik musi być zdjęciem'
        ];
    }
}
