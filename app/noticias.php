<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class noticias extends Model
{
    //

    protected $table = 'noticias';
    protected $primaryKey = 'id_noticias';

   /* public static function pegarNoticiasPrincipal(){
    	return DB::table('noticias')->orderBy('id_noticias', 'desc')->get();
	}
	*/
}
