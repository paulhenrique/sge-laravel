<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\EventoModel;
use App\AtividadeModel;
use App\ImagesEvento;
use App\User;
use App\userEventoModel;
use App\UserAtividadeModel;
use PDF;

class PdfController extends Controller
{
    public function GeneratePDF(Request $data) {
        $eventos = DB::table('evento')
                        ->join('user_evento','evento.idEvento','=','user_evento.idEvento')
                        ->join('users','user_evento.idUser','=','users.id')
                        ->where('user_evento.idUser','=',Auth()->id())
                        ->where('evento.idEvento', '=', $data['idEvento'])
                        ->select('users.name','evento.Nome', 'evento.DataInicio', 'evento.DataFim')
                        ->get();

        $atividades = DB::table('atividade')
                            ->join('user_atividade','atividade.idAtividade','=','user_atividade.idAtividade')
                            ->where('user_atividade.idUser','=', Auth()->id())
                            ->where('atividade.idEvento','=', $data['idEvento'])
                            ->select('atividade.nomeAtividade')
                            ->get();

        // echo "<pre>";
        // print_r($evento);
        // print_r($atividades);
        // die();

        $pdf = PDF::loadView('user.pdf',compact('eventos','atividades'));

        return $pdf->setPaper('a4','landscape')->stream("certificado.pdf");

    }

}
