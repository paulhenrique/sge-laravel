<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\EventoModel;
use App\AtividadeModel;
use App\ImagesEvento;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\EventRequest;
use Gate;

class EventoController extends Controller
{

    public function show(Request $data){
        $evento = EventoModel::where('idEvento',$data->idEvento)->get();
        $atividades = AtividadeModel::where('idEvento','=',$data->idEvento)->orderBy('DataInicio')->get();
        $images = ImagesEvento::where('idEvento', $data['idEvento'])->get();

        return view('Evento.show', compact(['evento','atividades','images']));
    }

    public function view($Apelido){
        
        echo $Apelido;

        // $evento = EventoModel::where('Apelido',$Apelido)->get();
        // $atividades = AtividadeModel::where('idEvento','=',$data->idEvento)->orderBy('DataInicio')->get();
        // $images = ImagesEvento::where('idEvento', $data['idEvento'])->get();

        //return view('Evento.show', compact(['evento','atividades','images']));
    }



    public function ShowForm(Request $data) {
        if(isset($data->idEvento)){
            $eventos = DB::table('evento')->where('idEvento', $data->idEvento)->first();
            return view('Evento.formEvento',compact('eventos'));
        }else{
            return view('Evento.formEvento');
        }


    }

    public function create(EventRequest $data){
        $validated = $data->validated();
        if ($data->hasFile('logo') && $data->file('logo')->isValid()) {
            $name = uniqid(date('HisYmd'));
            $extension = $data->logo->extension();
            $namefile = "{$name}.{$extension}";
            $upload = $data->logo->store('logo_evento');
            //$visibility = Storage::getVisibility($upload);
            //Storage::setVisibility($upload,'public');

            EventoModel::create([
                'CondicaoEvento' => 'Ativado',
                'Nome' => $data['Nome'],
                'Apelido' => $data['Apelido'],
                'DataInicio'   => $data['DataInicio'],
                'DataFim'   => $data['DataFim'],
                'DataLimiteInscricao'   => $data['DataLimiteInscricao'],
                'ConteudoProgramatico'   => $data['ConteudoProgramatico'],
                'Responsavel' => $data['Responsavel'],
                'CargaHoraria'   => $data['CargaHoraria']."H",
                'HorarioInicio'   => $data['HorarioInicio'],
                'HorarioFim'   => $data['HorarioFim'],
                'Local'   => $data['Local'],
                'Logo'   => $upload,
                ]);
            return redirect()->route('list_evento_admin');

        }

        // arquivo de image é válido
    }

    public function read() {
        $eventos = EventoModel::orderBy('idEvento')->get();

        return view('Evento.list',compact('eventos'));

    }

    public function read_dashboard() {
        $eventos = EventoModel::orderBy('idEvento')->get();

        return view('admin.listEvento',compact('eventos'));

    }

    public function update(Request $data)
    {
        if ($data->hasFile('logo') && $data->file('logo')->isValid()) {
            $name = uniqid(date('HisYmd'));
            $extension = $data->logo->extension();
            $namefile = "{$name}.{$extension}";
            $upload = $data->logo->store('logo_evento');

            $eventos = EventoModel::findOrFail($data['idEvento']);
            $eventos->Nome = $data['Nome'];
            $evento->Apelido = $data['Apelido'];
            $eventos->DataInicio = $data['DataInicio'];
            $eventos->DataFim = $data['DataFim'];
            $eventos->DataLimiteInscricao = $data['DataLimiteInscricao'];
            $eventos->ConteudoProgramatico = $data['ConteudoProgramatico'];
            $eventos->Responsavel = $data['Responsavel'];
            $eventos->CargaHoraria = $data['CargaHoraria'].'H';
            $eventos->HorarioInicio = $data['HorarioInicio'];
            $eventos->HorarioFim = $data['HorarioFim'];
            $eventos->Local = $data['Local'];
            $eventos->Logo = $upload;
            $eventos->save();

            return redirect()->route('list_evento_admin');
        }
    }

    public function delete (Request $data) {
        $eventos = EventoModel::findOrFail($data['idEvento']);
            $eventos->CondicaoEvento = 'Desativado';
            $eventos->save();

        return redirect()->route('list_evento_admin');
    }
}


