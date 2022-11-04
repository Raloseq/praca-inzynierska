<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ServiceOrderStoreRequest extends FormRequest
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
            'damage_photo' => 'nullable|image',
            'admission_date' => 'date|required',
            'description' => 'required|string',
            'price' => 'numeric',
            'car_id' => 'required',
            'employee_id' => 'required',
            'client_id' => 'required',
            'end_date' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'damage_photo.image' => 'To musi być zdjęcie',
            'admisstion_date' => 'Wartość musi być datą',
            'price.numeric' => 'Cena musi być wartością liczbową'
        ];
    }
}
