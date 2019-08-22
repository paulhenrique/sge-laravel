<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'Nome' => 'required',
            'DataInicio' => 'required',
            'DataFim' => 'required',
            'DataLimiteInscricao' => 'required',
            'ConteudoProgramatico' => 'required',
            'Responsavel' => 'required',
            'CargaHoraria' => 'required',
            'HorarioInicio' => 'required',
            'HorarioFim' => 'required',
            'Local' => 'required',
            'Logo' => 'required'
        ];
    }
}
