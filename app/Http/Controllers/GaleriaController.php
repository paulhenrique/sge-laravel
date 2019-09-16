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

class GaleriaController extends Controller
{
    public function showGaleria(Request $data){
        $images = ImagesEvento::where('idEvento', $data['idEvento'])->get();

        return view('admin.galeriaEdit')->with('idEvento',$data['idEvento'])->with('images',$images);
    }

    public function addGaleria(Request $data){
        if ($data->hasFile('image') && $data->file('image')->isValid()) {
            $name = uniqid(date('HisYmd'));
            $extension = $data->image->extension();
            $namefile = "{$name}.{$extension}";
            $upload = $data->image->store('image_evento');

            ImagesEvento::create([
                'idEvento' => $data['idEvento'],
                'Images' => $upload
            ]);


            return redirect()->back();
        }
    }

    public function delete(Request $data){
        $id = $data['idImage'];

        ImagesEvento::destroy($id);

        return redirect()->back();
    }  
}
