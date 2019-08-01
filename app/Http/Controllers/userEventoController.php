<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\userEventoModel;

class userEventoController extends Controller
{
    public function inscrever(Request $data){

        userEventoModel::create([
            'idEvento' => $data['idEvento'],
            'idUser' => $data['idUser']
        ]);

        return redirect()->route('listEvent');
    }
}
