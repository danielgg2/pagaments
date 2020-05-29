<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PagamentRequest extends FormRequest
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
     *
     * @return array
     */
    public function rules()
    {
        return [
            'categoria_id' => 'required|numeric|max:99999',
            'compte_id' => 'required|numeric|max:99999',
            'curs_id' => 'required|numeric|max:99999',
            'usuari_id' => 'required|numeric|max:99999',
            'nivell' => ['required',Rule::in(['ESO', 'BAT', 'CF', 'PR']),],
            'comanda' => 'required|string|max:20',
            'titol' => 'required|string|max:150',
            'descripcio' => 'required|string',
            'preu' => 'required|numeric|max:9999',
            'data_inici' => 'required|date|before:tomorrow',
            'data_fi' => 'required|date|after:data_inici',
            'estat' => ['required',Rule::in(['Actiu', 'Inactiu']),],
        ];
    }
}
