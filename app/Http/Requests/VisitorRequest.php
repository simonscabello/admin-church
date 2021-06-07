<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VisitorRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'min:3'],
            'address' => ['min:3'],
            'visit_day' => ['required', 'date']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Por favor, insira o nome do visitante',
            'name.min' => 'Por favor, insira o nome completo do visitante',
            'address.min' => 'Por favor, insira o endereço completo do visitante',
            'visit_day.required' => 'Por favor, insira a data em que o visitante visitou a igreja',
            'visit_day.date' => 'Por favor, insira uma data'
        ];
    }
}
