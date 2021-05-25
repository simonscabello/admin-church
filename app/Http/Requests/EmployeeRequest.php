<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'address' => ['required', 'min:3', 'max:255'],
            'cpf' => ['required'],
            'occupation' => ['required'],
            'description' => ['required'],
            'phone' => ['required'],
            'email' => ['email'],
            'started_in' => ['required', 'date'],
            'salary' => ['required']
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Por favor, insira o nome',
            'name.min' => 'Por favor, insira o nome completo',
            'name.max' => 'Por favor, verifique o nome e tente novamente',
            'address.required' => 'Por favor, insira o endereço',
            'address.min' => 'Por favor, insira o endereço completo',
            'address.max' => 'Por favor, verifique o endereço e tente novamente',
            'cpf.required' => 'Por favor, insira o CPF',
            'occupation.required' => 'Por favor, insira a função',
            'phone.required' => 'Por favor, insira o numero de contato',
            'email.email' => 'Por favor, insira um email válido',
            'started_in.required' => 'Por favor, insira a data de inicio do vinculo',
            'started_in.date' => 'Por favor, insira uma data válida',
            'salary.required' => 'Por favor, insira o salário do funcionario',
        ];
    }
}
