<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class noticias extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        return [
            'id' => $this->id_noticias,
            'titulo' => $this->titulo_noticia,
            'decricao' => $this->descricao_noticia,
            'texto' => $this->texto_noticia,
            'img' => $this->img_noticia
        ];
    }


}
