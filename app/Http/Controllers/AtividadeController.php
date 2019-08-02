<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\AtividadeModel;
use App\EventoModel;

class AtividadeController extends Controller
{
    
    public function ShowFormAtividade(Request $data) {
        $evento = DB::table('evento')->orderBy('idEvento')->get();

        if(isset($data->idAtividade)){
            $atividades = DB::table('atividade')->where('idAtividade', $data->idAtividade)->first();
            return view('atividade.AtividadeForm',compact('atividades','evento'));
        }else{
            return view('atividade.AtividadeForm',compact('evento'));
        }
    }

    public function create(Request $data){ 
       //dd($data);
        AtividadeModel::create([
            //'idAtividade' => $data['idAtividade'],
            'nomeAtividade'   => $data['nomeAtividade'],
            'tipo'   => $data['tipo'],
            'DataInicio'   => $data['dtInicio'],
            'DataTermino'   => $data['dtFim'],
            'HoraInicio' => $data['hrInicio'],
            'HoraTermino'   => $data['hrFim'],
            'NumMaxParticipantes'   => $data['NumMaxParticipantes'],
            'local'   => $data['local'],
            'idUser'   => auth()->user()->id,
            'idEvento'   => $data['idEvento']
            ]);
        
        return redirect()->route('listAtividade',['idEvento' => $data['idEvento']]);
    }

    public function read(Request $data) {


        if(isset($data->idEvento)){
            $atividades = DB::table('atividade')->where('idEvento', $data->idEvento)->get();
        }else{
            $atividades = AtividadeModel::orderBy('idAtividade')->get();
        }

        return view('atividade.showAtividade',compact('atividades'));        
    } 

    public function update(Request $data)
    {
        $atividades = AtividadeModel::findOrFail($data['idAtividade']);
        $atividades->nomeAtividade = $data['nomeAtividade'];
        $atividades->tipo = $data['tipo'];
        $atividades->DataInicio = $data['dtInicio'];
        $atividades->DataTermino = $data['dtFim'];
        $atividades->HoraInicio = $data['hrInicio'];
        $atividades->HoraTermino = $data['hrFim'];
        $atividades->Local = $data['local'];
        $atividades->NumMaxParticipantes = $data['NumMaxParticipantes'];
        $atividades->idUser = auth()->user()->id;
        $atividades->idEvento = $data['idEvento'];
        $atividades->save();

        return redirect()->route('listAtividade');
    }

    public function delete (Request $request) {
        $idAtividade = $request->query('deletar_atividade');
        EventoModel::destroy($request->idAtividade);
        
        return redirect()->route('listAtividade');
    }

}
