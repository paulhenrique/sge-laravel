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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * https://laravel.com/docs/master/validation#available-validation-rules
     * @return array
     */
    public function rules()
    {
        return [
            'nomeAtividade' => 'required',
            'tipo' => 'required',
            'DataInicio' => 'required',
            'DataTermino' => 'required',
            'HoraInicio' => 'required',
            'HoraTermino' => 'required',
            'NumMaxParticipantes' => 'required',
            'local' => 'required'
        ];
    }
}
