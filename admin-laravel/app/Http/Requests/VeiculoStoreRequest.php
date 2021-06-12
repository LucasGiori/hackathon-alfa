<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VeiculoStoreRequest extends FormRequest
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
            'modelo' => 'required',
            'anomodelo' => 'required',
            'anofabricacao' => 'required',
            'valor' => 'required',
            'tipo' => Rule::in(['NOVO','SEMINOVO']),
            'fotoDestaque' => 'required|image',
            'marca_id' => 'required',
            'cor_id' => 'required',
            'usuario_id' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'modelo.required' => 'Modelo é obrigatório',
            'anomodelo.required' => 'Ano Modelo é obrigatório',
            'anofabricacao.required' => 'Ano Fabricação é obrigatório',
            'valor.required' => 'Valor é obrigatório',
            'tipo.required' => 'Tipo Veículo é obrigatório',
            'fotoDestaque.required' => 'Foto é obrigatório',
            'fotoDestaque.image' => 'A Foto deve ser uma imagem',
            'marca_id.required' => 'MarcaController é obrigatório',
            'cor_id.required' => 'CorController é obrigatório',
            'usuario_id.required' => 'Usuario é obrigatório'
        ];
    }
}
