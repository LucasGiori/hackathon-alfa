<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AulaStoreRequest extends FormRequest
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
            'descricao' => 'required|min:3',
            'dia' => Rule::notIn(['1']),
            'horario' => 'required',
            'foto' => 'required|image'
        ];
    }

    public function messages() {
        return [
            'descricao.required' => "Matéria é obrigatória!",
            'descricao.min' => "Matéria deve possuir ao menos :min letras!",
            'dia.required' => "O dia é obrigatório!",
            'horario.required' => "Horario é obrigatório!",
            'foto.required' => "Foto é obrigatório!",
            'foto.image' => "Foto deve ser uma imagem!",
            'dia.not_in' => "Segunda feira nao tem mais aula"

        ];
    }
}
