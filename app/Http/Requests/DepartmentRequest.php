<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
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
            'member_id' => ['required'],
            'name' => ['required', 'min:3', 'string'],
            'description' => ['required', 'min:3']
        ];
    }

    public function messages(): array
    {
        return [
            'member_id.required' => 'Por favor, selecione um membro',
            'name.required' => 'Por favor, insira o nome do departamento',
            'name.min' => 'Por favor, insira o nome completo do departamento',
            'description.required' => 'Por favor, insira uma descrição',
            'description.min' => 'Por favor, insira uma descrição melhor'
        ];
    }
}
