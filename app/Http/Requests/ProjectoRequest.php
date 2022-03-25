<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectoRequest extends FormRequest
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
            'user_id' => ['required','regex:/\d+/u'],
            'tema_id' => ['required','regex:/\d+/u'],
            'nome' => ['required'],
            'tipo' => ['required'],
            'acesso' => ['required'],
            'data_inicio' => ['required','date'],
            'data_fim' => ['required','date'],
            'pro_descricao' => ['required'],
            'orcamento'
        ];
    }
}
