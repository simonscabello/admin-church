<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecordRequest extends FormRequest
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
            'number' => ['required', 'numeric'],
            'date' => ['required'],
            'file' => ['required']
        ];
    }

    public function messages(): array
    {
        return [
            'number.required' => 'Por favor, insira o número da ata',
            'number.numeric' => 'Por favor, insira um número válido',
            'date.required' => 'Por favor, insira a data em que a ata foi lida e aprovada',
            'file.required' => 'Por favor, insira um arquivo'
        ];
    }
}
