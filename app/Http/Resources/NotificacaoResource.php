<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NotificacaoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'titulo' => $this->titulo,
            'mensagem' => $this->mensagem,
            'canal' => $this->canal,
            'status' => $this->status,
            'lida_em' => $this->lida_em,
            'created_at' => $this->created_at,
        ];
    }
}
