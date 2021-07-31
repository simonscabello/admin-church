<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'nome' => $this->name,
            'descricao' => $this->description,
            'começo' => $this->start_date,
            'fim' => $this->end_date,
            'vagas_disponiveis' => $this->max_participants,
            'vagas_alocadas' => $this->registered_participants
        ];
    }
}
