<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListaOrcamentoHasUsuario extends Model
{
    //
    protected $table = "orcamento_lista_has_usuario";
    protected $fillable = [
    	'idorcamento_lista',
    	'usuario_id'
    ];

    
}
