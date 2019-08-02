<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\userEventoModel;
use App\UserAtividadeModel;

class UserAtividadeController extends Controller
{
    public function Inscrever(Request $data){
    	$evento_inscrito = DB::table('user_evento')
    	->where('idEvento','=',$data['idEvento'])
    	->where('idUser','=',auth()->user()->id)
    	->get();

    	foreach ($evento_inscrito as $evento) {
    		$even_user = $evento; 	
    	}

    	if(!empty($evento)){
    		UserAtividadeModel::create([
	            'idAtividade' => $data['idAtividade'],
	            'idUser' => auth()->user()->id
        	]);
    	}else{
    		$errors[] = "Não está inscrito no Evento dessa atividade";
    	}

    	return redirect()->route('listAtividade',['idEvento' => $data['idEvento']]);

    }
}
