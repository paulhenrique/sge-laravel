<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventoModel;
use App\AtividadeModel;
use App\ImagesEvento;
use App\userEventoModel;
use App\UserAtividadeModel;
use PDF;

class PdfController extends Controller
{
    public function GeneratePDF () {
        $eventos = EventoModel::all();
        $pdf = PDF::loadView('user.pdf',compact('eventos'));

        return $pdf->setPaper('a4','landscape')->stream("Nome_do_Evento.pdf");

    }
}
