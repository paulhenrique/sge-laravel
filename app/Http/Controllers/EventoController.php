<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\EventoModel;
use App\AtividadeModel;
use App\ImagesEvento;
use App\userEventoModel;
use App\UserAtividadeModel;
use App\TemplateModel;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\EventRequest;
use Gate;

class EventoController extends Controller
{

    public function show($Apelido){

        //pegando evento pelo apelido
        $eventos = EventoModel::where('Apelido', '=', $Apelido)->get()->first();

        $atividades = AtividadeModel::where('idEvento','=',$eventos->idEvento)->orderBy('DataInicio')->get();
        $images = ImagesEvento::where('idEvento', $eventos["idEvento"])->get();
        $template = TemplateModel::where('idTemplate', '=', $eventos['idTemplate'])->get();
        $url = $eventos['Site'];
        foreach ($template as $modelo) {
            $local_do_arquivo = $modelo->Local_do_Arquivo;
        }
        //dd($url);
        if(!is_null($url)){
            return redirect($url);
        }else{
            if (auth()->user()){
                $atividades = DB::table('atividade')->where('idEvento', $eventos->idEvento)->get();
                foreach ($atividades as $atividade) {
                    $atividade_inscrito = UserAtividadeModel::where('idUser', '=', auth()->user()->id)->where('idAtividade', '=', $atividade->idAtividade)->count();
                    $palestrantes = DB::table('users')->where('id', '=', $atividade->idPalestrante)->get();
                    if($atividade_inscrito !=0){
                        $atividade->inscrito = true;
                    }else{
                        $atividade->inscrito = false;
                    }
                }

                $evento_inscrito = userEventoModel::where('idUser', '=', auth()->user()->id)->where('idEvento', '=', $eventos->idEvento)->count();
                if($evento_inscrito !=0){
                    $eventos->inscrito = true;
                }else{
                    $eventos->inscrito = false;
                }
                if (count($atividades) > 0 ) {
                foreach ($atividades as $atividade) {
                    $atividade_inscrito = UserAtividadeModel::where('idUser', '=', auth()->user()->id)->where('idAtividade', '=', $atividade->idAtividade)->count();
                    $palestrantes = DB::table('users')->where('id', '=', $atividade->idPalestrante)->get();
                    if ($atividade_inscrito != 0) {
                        $atividade->inscrito = true;
                    } else {
                        $atividade->inscrito = false;
                    }
                }
                    return view('Evento.show', compact('eventos', 'atividades', 'images', 'palestrantes'));
            } else {
                    return view('Evento.show', compact('eventos', 'atividades', 'images'));
            }

            }


            return view('Evento.show', compact(['eventos','atividades','images','palestrantes']));
        }
    }

    public function ShowForm(Request $data) {

        if(isset($data->idEvento)){
            $templates = DB::table('template_evento')->get();
            $eventos = DB::table('evento')->where('idEvento', $data->idEvento)->first();
            return view('Evento.formEvento',compact('eventos','templates'));
        }else{
            $templates = DB::table('template_evento')->get();
            return view('Evento.formEvento', compact('templates'));
        }


    }

    public function create(EventRequest $data){

        //dd($data);
        $data['DataInicio'] = strtr($data['DataInicio'], '/', '-');
        $data['DataFim'] = strtr($data['DataFim'], '/', '-');
        $data['DataLimiteInscricao'] = strtr($data['DataLimiteInscricao'], '/', '-');
        $data['DataFim'] = date('Y-m-d', strtotime($data['DataFim']));
        $data['DataInicio'] = date('Y-m-d', strtotime($data['DataInicio']));
        $data['DataLimiteInscricao'] = date('Y-m-d', strtotime($data['DataLimiteInscricao']));

        $validated = $data->validated();

        if  ((strtotime($data['DataInicio']) <= strtotime($data['DataFim']))
        && (strtotime($data['DataLimiteInscricao']) <= strtotime($data['DataFim']))){
            if ($data->hasFile('logo') && $data->file('logo')->isValid()) {
                $name = uniqid(date('HisYmd'));
                $extension = $data->logo->extension();
                $namefile    = "{$name}.{$extension}";
                $upload = $data->logo->store('logo_evento');
                //$visibility = Storage::getVisibility($upload);
                //Storage::setVisibility($upload,'public');

                EventoModel::create([
                    'CondicaoEvento' => 'Ativado',
                    'CondicaoCadastroDeAtividade'=> $data['CondicaoCadastroDeAtividade'],
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
                    'Site'   => $data['Site'],
                    'idTemplate' => $data['idTemplate'],
                    ]);
                return redirect()->route('list_evento_admin');
            }
        }else{
            return redirect()->route('showForm_create_evento')->withErrors('Verifique as datas inseridas! As datas de inicio e de limite de inscrição devem ser anteriores a data de término.');
        }
    }

    public function read() {
        $eventos = DB::table('evento')->get();

        if (auth()->user()){
            $eventos = DB::table('evento')->get();
            foreach ($eventos as $evento) {
                $evento_inscrito = userEventoModel::where('idUser', '=', auth()->user()->id)->where('idEvento', '=', $evento->idEvento)->count();
                if($evento_inscrito !=0){
                    $evento->inscrito = true;
                }else{
                    $evento->inscrito = false;
                }
            }

            return view('Evento.list',compact('eventos'));
        }
        return view('Evento.list',compact('eventos'));

    }

    public function read_dashboard() {
        $eventos = EventoModel::orderBy('idEvento')->get();

        return view('admin.listEvento',compact('eventos'));

    }

    public function update(EventRequest $data)
    {
        $data['DataInicio'] = strtr($data['DataInicio'], '/', '-');
        $data['DataFim'] = strtr($data['DataFim'], '/', '-');
        $data['DataLimiteInscricao'] = strtr($data['DataLimiteInscricao'], '/', '-');
        $data['DataFim'] = date('Y-m-d', strtotime($data['DataFim']));
        $data['DataInicio'] = date('Y-m-d', strtotime($data['DataInicio']));
        $data['DataLimiteInscricao'] = date('Y-m-d', strtotime($data['DataLimiteInscricao']));

        $validated = $data->validated();
        if ($data->hasFile('logo') && $data->file('logo')->isValid()) {
            $name = uniqid(date('HisYmd'));
            $extension = $data->logo->extension();
            $namefile = "{$name}.{$extension}";
            $upload = $data->logo->store('logo_evento');

            $eventos = EventoModel::findOrFail($data['idEvento']);
            $eventos->CondicaoCadastroDeAtividade = $data['CondicaoCadastroDeAtividade'];
            $eventos->Nome = $data['Nome'];
            $eventos->Apelido = $data['Apelido'];
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
            $eventos->Site = $data['Site'];
            $eventos->idTemplate = $data['idTemplate'];
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


