<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed id
 * @property mixed relationshipStatus
 * @property mixed gender
 * @property mixed name
 * @property mixed birth_day
 * @property mixed email
 * @property mixed phone
 * @property mixed address
 */
class MemberResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'relacionamento' => $this->relationshipStatus->description,
            'genero' => $this->gender->description,
            'nome' => $this->name,
            'data_nascimento' => $this->birth_day,
            'email' => $this->email,
            'telefone' => $this->phone,
            'endereco' => $this->address
        ];
    }
}
