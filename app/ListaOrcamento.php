<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListaOrcamento extends Model
{
    //
    protected $table = "orcamento_lista";
    protected $primaryKey = "idorcamento_lista";

    protected $fillable = [
    	'orcLista_empresa',
    	'orcLista_contato',
    	'orcLista_data',
    	'orcLista_horario',
    	'orcLista_telefone',
    	'orcLista_observacao',
    	'orcLista_data_prechimento'    	
    ];
    
}
