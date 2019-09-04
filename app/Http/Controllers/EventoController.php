<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\EventoModel;
use App\AtividadeModel;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\EventRequest;

class EventoController extends Controller
{

    public function show(Request $data){
        $evento = EventoModel::where('idEvento',$data->idEvento)->get();
        $atividades = AtividadeModel::where('idEvento','=',$data->idEvento)->get();
        return view('Evento.show', compact(['evento','atividades']));
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
        echo "oi";
        $validated = $data->validated();
        if ($data->hasFile('logo') && $data->file('logo')->isValid()) {
            $name = uniqid(date('HisYmd'));
            $extension = $data->logo->extension();
            $namefile = "{$name}.{$extension}";
            $upload = $data->logo->store('logo_evento');
            //$visibility = Storage::getVisibility($upload);
            //Storage::setVisibility($upload,'public');
            
            EventoModel::create([
                'Nome' => $data['Nome'],
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
            
            return redirect()->route('listEvent');        

    } 
    
        // arquivo de image é válido
    }

    public function read() {
        //$tasks = Task::orderBy('created_at', 'desc')->get();
        $eventos = EventoModel::orderBy('idEvento')->get();

        return view('Evento.list',compact('eventos'));
        
    } 

    public function read_dashboard() {
        //$tasks = Task::orderBy('created_at', 'desc')->get();
        $eventos = EventoModel::orderBy('idEvento')->get();

        return view('admin.listEvento',compact('eventos'));
        
    } 

    public function update(Request $data)
    {
        $eventos = EventoModel::findOrFail($data['idEvento']);
        $eventos->Nome = $data['nome'];
        $eventos->DataInicio = $data['dtInicio'];
        $eventos->DataFim = $data['dtFim'];
        $eventos->DataLimiteInscricao = $data['dtlimite'];
        $eventos->ConteudoProgramatico = $data['ConteudoProgramatico'];
        $eventos->Responsavel = $data['responsavel'];
        $eventos->CargaHoraria = $data['cargaHoraria'];
        $eventos->HorarioInicio = $data['hrInicio'];
        $eventos->HorarioFim = $data['hrFim'];
        $eventos->Local = $data['local'];
        $eventos->Logo = $data['logo'];
        $eventos->save();

        return redirect()->route('listEvent');
    }

    public function delete (Request $request) {
        $idEvento = $request->query('deletar_evento');
        EventoModel::destroy($request->idEvento);
        
        return redirect()->route('listEvent');
    }




    // public function editar (EventoModel $evento) {

    //     $evento->save();

    //     return $evento;
    // }
}


