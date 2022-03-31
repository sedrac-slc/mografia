<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubtituloRequest extends FormRequest
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
            'titulo_id' => ['required','regex:/\d+/u'],
            'user_id' => ['required','regex:/\d+/u'],
            'sub_descricao' => ['required','string'],
            'prioridade'
        ];
    }
}
