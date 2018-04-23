<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ListaOrcamento extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->idorcamento_lista,
            'empresa' => $this->orcLista_empresa,
            'contato' => $this->orcLista_contato,
            'data' => $this->orcLista_data,
            'hora' => $this->orcLista_horario,
            'telefone' => $this->orcLista_telefone,
            'responsavel' => $this->orcLista_reponsavel
        ];
    }
}
