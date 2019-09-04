<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\userEventoModel;
use App\EventoModel;

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
		
    	if(empty($even_user)){
	        userEventoModel::create([
	            'idEvento' => $data['idEvento'],
				'idUser' => auth()->user()->id
			]);
			return redirect()->back()->with('success', 'Sucesso, você está inscrito no evento!');
        }else{
			return redirect()->back()->with('error', 'Falha: já está inscrito no evento!');
		}
        
	}
	

	public function listaDeChamada(Request $data){
		$participantes = DB::table('user_evento')
							->join('users','users.id','=','user_evento.idUser')
							->select('idUser','name')
							->where('idEvento', '=',$data['idEvento'])
							->get();
		
		$evento = EventoModel::where('idEvento',$data->idEvento)->get();

		echo "<pre>";
		print_r($participantes);
		print_r($evento);
		echo "</pre>";
		return view('admin.listaDeChamadaEvento');
	}
}
