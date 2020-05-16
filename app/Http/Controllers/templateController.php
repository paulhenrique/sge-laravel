<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\TemplateModel;
use App\Http\Controllers\Controller;

class templateController extends Controller
{
    public function showForm(Request $data){
        if(isset($data->idTemplate)){
            $template = DB::table('template_evento')->where('idTemplate', $data->idTemplate)->get();
            return view('Admin.formTemplate',compact('template'));
        }else{
            return view('Admin.formTemplate');
        }
    }

    public function create(Request $data){

            if ($data->hasFile('Image_preview') && $data->file('Image_preview')->isValid()) {
                $name = uniqid(date('HisYmd'));
                $extension = request()->file('Image_preview')->extension();
                $nameFile = "{$name}.{$extension}";
                $upload = request()->file('Image_preview')->storeAs('template_preview', $nameFile);

                if (!$upload) {
                    echo "Erro";
                    return redirect()->back()->withErrors('error', 'Falha ao fazer upload');
                }

            TemplateModel::create([
                'Nome' => $data['Nome'],
                'Image_preview'   => $upload,
                'Local_do_Arquivo'   => $data['Local_do_Arquivo'],
            ]);
        }
        return redirect()->route('list_evento_admin');
    }

    public function update(Request $data)
    {
        $template = AtividadeModel::findOrFail($data['idAtividade']);
        $template->Nome = $data['Nome'];
        $template->Image_preview = $data['Image_preview'];
        $template->Local_do_Arquivo = $data['Local_do_Arquivo'];
        $template->save();

        return redirect()->route('list_evento_admin');
    }

    public function delete (Request $request) {
        $atividade = AtividadeModel::findOrFail($request['idAtividade']);
            $atividade->CondicaoAtividade = 'Desativado';
            $atividade->save();

            return redirect()->route('list_evento_admin');
    }
}
