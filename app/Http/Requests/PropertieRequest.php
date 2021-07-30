<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertieRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:3'],
            'serial_number' => ['required'],
            'description' => ['required', 'min:3'],
            'amount' => ['required'],
            'donated' => ['required']
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Por favor, insira o nome do patrimônio',
            'name.min' => 'Por favor, insira o nome completo',
            'serial_number.required' => 'Por favor, insira o número de serial do patrimônio',
            'description.required' => 'Por favor, insira a descrição',
            'description.min' => 'Por favor, insira a descrição completa',
            'amount.required' => 'Por favor, insira a quantidade',
            'donated' => 'Por favor, informe se o patrimônio foi doado'
        ];
    }
}
