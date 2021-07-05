<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
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
            'name' => ['required', 'min:3', 'max:255'],
            'gender_id' => ['required'],
            'cpf' => ['required'],
            'rg' => ['required', 'numeric'],
            'email' => ['nullable','email'],
            'birth_day' => ['required'],
            'address' => ['required', 'min:3'],
            'birth_place' => ['required'],
            'conversion_date' => ['required'],
            'baptism_day' => ['required'],
            'father_name' => ['nullable', 'min:3'],
            'mother_name' => ['nullable', 'min:3'],
            'relationship_status_id' => ['required'],
            'phone' => ['required']
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Por favor, insira o nome',
            'name.min' => 'Por favor, insira o nome completo',
            'name.max' => 'Por favor, verifique o nome e tente novamente',
            'gender_id.required' => 'Por favor, insira o sexo',
            'cpf.required' => 'Por favor, insira o CPF',
            'email.email' => 'Por favor, insira um e-mail válido',
            'birth_day.required' => 'Por favor, insira a data de nascimento',
            'address.required' => 'Por favor, insira o endereço',
            'address.min' => 'Por favor, insira o endereço completo',
            'rg.required' => 'Por favor, insira o RG',
            'rg.numeric' => 'Por favor, insira um RG válido',
            'birth_place.required' => 'Por favor, insira a naturalidade',
            'baptism_day.required' => 'Por favor, insira a data do batismo',
            'father_name.min' => 'Por favor, insira o nome completo',
            'mother_name.min' => 'Por favor, insira o nome completo',
            'relationship_status_id.required' => 'Por favor, informe o estado civil',
            'phone' => 'Por favor, insira o número do telefone'
        ];
    }
}
