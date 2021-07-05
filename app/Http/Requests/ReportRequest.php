<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportRequest extends FormRequest
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
            'name' => ['required'],
            'month' => ['required'],
            'entries' => ['required', 'float'],
            'exits' => ['required', 'float'],
            'file' => ['required']
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Por favor, insira o nome do relatório',
            'month.required' => 'Por favor, insira o mês do relatório',
            'entries.required' => 'Por favor, insira as entradas',
            'exits.required' => 'Por favor, insira as saídas',
            'file.required' => 'Por favor, insira um arquivo'
        ];
    }
}
