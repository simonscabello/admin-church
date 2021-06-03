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
    public function rules()
    {
        return [
            'name' => ['required', 'min:3', 'max:255'],
            'gender' => ['required'],
            'cpf' => ['required'],
            'email' => ['email'],
            'age' => ['required'],
            'address' => ['required', 'min:3'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Por favor, insira o nome',
            'name.min' => 'Por favor, insira o nome completo',
            'name.max' => 'Por favor, verifique o nome e tente novamente',
            'gender.required' => 'Por favor, insira o sexo',
            'cpf.required' => 'Por favor, insire o CPF',
            'email.email' => 'Por favor, insira um e-mail válido',
            'age.required' => 'Por favor, insira a data de nascimento',
            'address.required' => 'Por favor, insira o endereço',
            'address.min' => 'Por favor, insira o endereço completo',
        ];
    }
}
