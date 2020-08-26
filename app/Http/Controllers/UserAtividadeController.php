<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\userEventoModel;
use App\UserAtividadeModel;
use App\User;

class UserAtividadeController extends Controller
{
    public function Inscrever(Request $data){
        //Verificando quantidade de inscritos
        $atividade_quant_inscritos = DB::table('user_atividade')
        ->where('idAtividade','=',$data['idAtividade'])
        ->count();
        $atividade_quant_inscritos_tot = DB::table('atividade')
        ->where('idAtividade','=',$data['idAtividade'])
        ->get('NumMaxParticipantes')->first();

        //Verificando se o usuário está inscrito no evento que possui essa tividade

        if($atividade_quant_inscritos <= $atividade_quant_inscritos_tot->NumMaxParticipantes){

            //Verficando se o usuario esta inscrito no evento
            $evento_inscrito = DB::table('user_evento')
            ->where('idEvento','=',$data['idEvento'])
            ->where('idUser','=',auth()->user()->id)
            ->count();

            if($evento_inscrito != 0){
                $atividade_inscrito = DB::table('user_atividade')
                ->where('idAtividade','=',$data['idAtividade'])
                ->where('idUser','=', auth()->user()->id)
                ->count();

                if($atividade_inscrito == 0){
                UserAtividadeModel::create([
                        'idAtividade' => $data['idAtividade'],
                        'idUser' => auth()->user()->id
                    ])->save();

                }else{
                    return redirect()->back()->with('error', 'Já está inscrito nessa atividade');
                }

            }else{
                return redirect()->back()->with('error', 'É necessario estar inscrito no evento dessa atividade');
            }

            return redirect()->back()->with('success', 'Sucesso, você está inscrito no evento!');

        }else{
           return redirect()->back()->with('error', 'Infelizmente não possuímos vagas para a atividade desejada, tente outra.');
        }
    }
    public function desinscrever(Request $data)
	{
		UserAtividadeModel::where('idAtividade','=',$data['idAtividade'])->where('idUser','=',auth()->user()->id)->delete();

		return redirect()->back();
    }


    public function listaDeChamada(Request $data){
        $participantes = DB::table('user_atividade')
							->join('users','users.id','=','user_atividade.idUser')
							->where('idAtividade', '=',$data['idAtividade'])
							->get();

        return view('admin.listaDeChamadaAtividade')->with('participantes',$participantes);
    }

    public function update(Request $data)
    {
        $idUserAtividade    = $data['idUserAtividade'];
		$status             = $data['status'];

		if($status == 'Presente'){
			UserAtividadeModel::where('idUserAtividade',$idUserAtividade)->update(['presente' => True, 'ausente' => False]);
		}elseif($status == 'Ausente'){
			UserAtividadeModel::where('idUserAtividade',$idUserAtividade)->update(['presente' => False, 'ausente' => True]);
		}

        return redirect()->back();
	}
}
