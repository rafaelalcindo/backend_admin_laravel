<?php

/**
* 
*/
namespace App\BuildQuery;

class BuildQueryOrcamento 
{
	
	

	public static function QueryTelaOrcamento(){
		$sqlQuery = "select orcLista_empresa as 'empresa', orcLista_contato as 'contato', DATE_FORMAT(orcLista_data, '%d/%m/%Y') as 'data',
						orcLista_horario as 'hora', orcLista_telefone as 'telefone', orcLista_observacao as 'observacao',
						orcLista_responsavel as 'responsavel', orcLista_vistoria as 'vistoria', orcLista_resposavel_vistoria as 'responsavelVistoria',
						orcLista_meio_entrega as 'meioEntrega' from orcamento_lista where orcLista_entregue = 0 order by orcLista_data asc";
		return $sqlQuery;
	}
}