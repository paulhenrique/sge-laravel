<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\EventoModel;

class EventoController extends Controller
{
    public function ShowForm() {

     return view('Evento.formEvento');   
    }

    public function create(Request $data){ 


        
        return EventoModel::create([
            'Nome' => $data['nome'],
            'DataInicio'   => $data['dtInicio'],
            'DataFim'   => $data['dtFim'],
            'DataLimiteInscricao'   => $data['dtlimite'],
            'ConteudoProgramatico'   => $data['ConteudoProgramatico'],
            'Responsavel' => $data['responsavel'],
            'CargaHoraria'   => $data['cargaHoraria'],
            'HorarioInicio'   => $data['hrInicio'],
            'HorarioFim'   => $data['hrFim'],
            'Local'   => $data['local'],
            'Logo'   => $data['logo'],
            ]);
        
    }
}
