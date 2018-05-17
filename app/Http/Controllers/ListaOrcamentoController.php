<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ListaOrcamento;
use App\ListaOrcamentoHasUsuario as OrcamentoHasUsuario;
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

    public function ListarFuncionarioEngenharia() {
        $ListaFuncEngenharia = Usuario_Auth::all()->where('usuario_dep','engenharia');
        return UsuarioResource::collection($ListaFuncEngenharia);
    }

    public function LigarOcamento(Request $Request) {
        $orcamentoResto = array();
        $orcamentoResto['orcLista_vistoria']             = $Request->input('vistoria');
        $orcamentoResto['orcLista_responsavel']          = $Request->input('responsavel');
        $orcamentoResto['orcLista_resposavel_vistoria']  = $Request->input('responsavel_vistoria');
        $orcamentoResto['orcLista_meio_entrega']         = $Request->input('meio_entrega');
        $orcamentoResto['orcLista_data_vistoria']        = $Request->input('data_vistoria');
        $idOrcamento                                     = $Request->input('id_orcamento');
        $idUsuario                                       = $Request->input('id_usuario');

        $ligarOrcamento = array();
        $ligarOrcamento['idorcamento_lista'] = $idOrcamento;
        $ligarOrcamento['usuario_id']        = $idUsuario;

        $ligandoOrcamento = OrcamentoHasUsuario::create($ligarOrcamento);

        if($ligandoOrcamento){
            //atualizando Lista Orcamento
            $UpdateOrcamentoLista = ListaOrcamento::where('idorcamento_lista', $idOrcamento)->update($orcamentoResto);
            if($UpdateOrcamentoLista){
                return '[{"resultado": "1" }]';
            } else {
                return '[{"resultado": "0" }]';
            }
            //return $UpdateOrcamentoLista;
        } else { return '[{"resultado": "0" }]'; }

    }

    public function getOrcamentoForUpdate($id) {
        $idOrcamento = $id;
        $orcamentoIndividual = ListaOrcamento::all()->where('idorcamento_lista', $idOrcamento);
        return ListaOrcamentoResource::collection($orcamentoIndividual);
    }

    public function AtualizarOrcamento(Request $Request) {
        $orcamenotUpdate = array();
        $orcamenotUpdate['orcLista_vistoria']            = $Request->input('vistoria');
        $orcamenotUpdate['orcLista_responsavel']         = $Request->input('responsavel');
        $orcamenotUpdate['orcLista_resposavel_vistoria'] = $Request->input('responsavel_vistoria');
        $orcamenotUpdate['orcLista_meio_entrega']        = $Request->input('meio_entrega');
        $orcamenotUpdate['orcLista_data_vistoria']       = $Request->input('data_vistoria');
        $idOrcamento                                     = $Request->input('id_orcamento');
        $idUsuario                                       = $Request->input('id_usuario');

        $ligarOrcamentoUpdate = array();
        $ligarOrcamentoUpdate['idorcamento_lista'] = $idOrcamento;
        $ligarOrcamentoUpdate['usuario_id']        = $idUsuario;

        $ligandoOrcamentoUpdate = OrcamentoHasUsuario::where('idorcamento_lista',$idOrcamento)->update($ligarOrcamentoUpdate);

        if($ligandoOrcamentoUpdate) {
            $UpdateOrcamentoLista = ListaOrcamento::where('idorcamento_lista', $idOrcamento)->update($orcamenotUpdate);
            if($UpdateOrcamentoLista){
                return '[{ "resultado": "1" }]';
            } else {
                return '[{"resultado": "0" }]';
            }
        } else { return '[{ "resultado": "0" }]'; }
    }

    
}
