<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TitheRequest extends FormRequest
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
            'date' => ['date', 'required'],
            'type' => ['required'],
            'value' => ['required']
        ];
    }

    public function messages(): array
    {
        return [
            'member_id.required' => 'Por favor, selecione um membro',
            'date.date' => 'Por favor, insira uma data válida',
            'date.required' => 'Por favor, insira uma data',
            'value.required' => 'Por favor, insira o valor'
        ];
    }
}
