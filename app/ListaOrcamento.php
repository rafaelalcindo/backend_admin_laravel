<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\BuildQuery\BuildQueryOrcamento;


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
    	'orcLista_data_prechimento',
        'orcLista_entregue'
    ];

    public function listarOrcamentoTela() {
        $queryTela =  BuildQueryOrcamento::QueryTelaOrcamento();
        $resultado = DB::select($queryTela);
        return $resultado;
    }
    
}
