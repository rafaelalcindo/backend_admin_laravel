<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\noticias;
use App\Http\Resources\noticias as NoticiasResource;


class NoticiasController extends Controller
{
    //
    public function index(){
    	//$noticias_pri = noticias::pegarNoticiasPrincipal();
    	$noticias = noticias::all()->sortByDesc('id_noticias')->take(3);
    	
    	//return  new NoticiasResource($noticias);
    	return NoticiasResource::collection($noticias);
    }

    public function pegarPrimeirasNoticias(){
    	$noticias = noticias::all()->sortByDesc('id_noticias')->slice(3,3);
    	return NoticiasResource::collection($noticias);
    }

    public function pegarNoticiaIndividual($id){
    	$noticias = noticias::all()->where('id_noticias', $id);

    	return NoticiasResource::collection($noticias);
    }

    public function pegarNoticiaGeral(){
        $noticias = noticias::paginate(5);

        return NoticiasResource::collection($noticias);
    }

    // Listagem de Orcamento

}
