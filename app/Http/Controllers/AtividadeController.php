<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\EventoModel;

class AtividadeController extends Controller
{
    
    public function showFormCreate(){
        $eventos = DB::table('evento')->orderBy('idEvento')->get();

        return view("atividade.AtividadeForm",compact('eventos'));
    }
}
