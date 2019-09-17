<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\userEventoModel;
use App\UserAtividadeModel;

class UserAtividadeController extends Controller
{
    public function Inscrever(Request $data){
        //Verificando se o usuário está inscrito no evento que possui essa tividade
    	$evento_inscrito = DB::table('user_evento')
    	->where('idEvento','=',$data['idEvento'])
    	->where('idUser','=',auth()->user()->id)
    	->get();

    	foreach ($evento_inscrito as $evento) {
    		$even_user = $evento;
    	}

    	if(!empty($evento)){
            $atividade_inscrito = DB::table('user_atividade')
            ->where('idAtividade','=',$data['idAtividade'])
            ->where('idUser','=',auth()->user()->id)
            ->get();

            //dd($atividade_inscrito);

            if(count($atividade_inscrito) == 0){
               UserAtividadeModel::create([
                    'idAtividade' => $data['idAtividade'],
                    'idUser' => auth()->user()->id
                ]);
            }else{
                $errors = "Já está inscrito na atividade";
            }

    	}else{
    		$errors[] = "Não está inscrito no Evento dessa atividade";
    	}

    	return redirect()->back();

    }
}
