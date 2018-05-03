<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ListaOrcamento;
use Carbon\Carbon;
use App\Http\Resources\ListaOrcamento as ListaOrcamentoResource;
use App\Http\Resources\Usuario as UsuarioResource;

use App\Usuario as Usuario_Auth;


class ListaOrcamentoController extends Controller
{
    public function InserirOrcamento(Request $Request){
    	
    	$orcamento = array();
    	$orcamento['orcLista_empresa']  		= $Request->input('empresa');
    	$orcamento['orcLista_data']  			= $Request->input('data');
    	$orcamento['orcLista_horario']	   		= $Request->input('hora');
    	$orcamento['orcLista_contato']  		= $Request->input('contato');
    	$orcamento['orcLista_telefone'] 		= $Request->input('telefone');
    	$orcamento['orcLista_observacao'] 		= $Request->input('observacao');
        $orcamento['orcLista_entregue']         = $Request->input('entregue');
    	//$orcamento['orcLista_data_prechimento'] = Carbon::now()->toDateTimeString();

    	$orcamentoBanco = ListaOrcamento::create($orcamento);

    	if($orcamentoBanco != null || $orcamentoBanco != ''){
    		return $orcamentoBanco;
    	}else{
    		return "{'status':'false'}";
    	}

    }


    public function ListarOrcamentoTela() {

    	$orcamentoLista = new ListaOrcamento();
    	$orcamentoTela = $orcamentoLista->listarOrcamentoTela();
    	return $orcamentoTela;
    }

    // ============= Listagem para indicar qual deve ser ligado ==================

    public function ListarOrcamentoParaLigar() { 
        $orcamentoListagem = ListaOrcamento::orderBy('orcLista_data','asc')->paginate(10);
        return ListaOrcamentoResource::collection($orcamentoListagem);
    }

    public function ListarFuncionarioOrcamento() {
        $ListaFuncOrcamento = Usuario_Auth::all()->where('usuario_dep','orcamento');
        return UsuarioResource::collection($ListaFuncOrcamento);
    }

    
}
