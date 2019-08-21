<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AtividadeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nomeAtividade' => 'required|max:255',
            'tipo' => 'required',
            'DataInicio' => 'required|date',
            'DataTermino' => 'required|date',
            'HoraInicio' => 'required|time',
            'HoraTermino' => 'required|time',
            'local' => 'required|max:255',
            'idUser' => 'required',
            'idEvento' => 'required',
            'NumMaxParticipantes' => 'required|integer',
        ];
    }
}
