<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'name'  => ['required', 'min:3'],
            'description' => ['required', 'min:3'],
            'start_date' => ['date', 'required'],
            'end_date' => ['required', 'date'],
            'max_participants' => ['required', 'integer']
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Por favor, insira o nome',
            'name.min' => 'Por favor, insira o nome do evento completo',
            'description.required' => 'Por favor, insira a descrição',
            'description.min' => 'Por favor, descrição muito pequena',
            'start_date.date' => 'Por favor, insira uma data válida',
            'start_date.required' => 'Por favor, insira a data',
            'end_date.required' => 'Por favor, insira a data de término',
            'end_date.date' => 'Por favor, insira uma data válida',
            'max_participants.required' => 'Por favor, insira o numero máximo de participantes',
            'max_participants.integer' => 'Por favor, insira um valor válido'
        ];
    }
}
