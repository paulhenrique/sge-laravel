<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\userEventoModel;

class userEventoController extends Controller
{
    public function inscrever(Request $data){
    	$evento_inscrito = DB::table('user_evento')
    	->where('idEvento','=',$data['idEvento'])
    	->where('idUser','=',auth()->user()->id)
    	->get();

    	foreach ($evento_inscrito as $evento) {
    		$even_user = $evento; 	
    	}
    	if(empty($evento_inscrito)){
	        userEventoModel::create([
	            'idEvento' => $data['idEvento'],
	            'idUser' => $data['idUser']
	        ]);
        }else{
        	$error[] = "Já está inscrito no evento!";
        }

        return redirect()->route('listEvent');
    }
}
