<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\TrabalhoModel;

class TrabalhoController extends Controller{

    public function createTrabalho(Request $data){

        print $data;

    }

    public function showFormTrabalho() {
        
        return view('trabalho.TrabalhoForm');

    }

}


