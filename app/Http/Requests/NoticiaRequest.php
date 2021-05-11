<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoticiaRequest extends FormRequest
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
            'descricao' => 'required',
            'resumo' => 'required',
            'data' => 'required',
            'autor' => 'required',
            'categoria_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'descricao.required' => 'Informe a descrição',
            'resumo.required' => 'Informe o resumo',
            'data.required' => 'Informe a data',
            'autor.required' => 'Informe o autor',
            'categoria_id.required' => 'Informe a categoria',
        ];
    }

}
