<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Validator;

class ContatoRequest extends FormRequest
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

 
            'nome'                   => 'required|max:150',
            'nascimento'             => 'required', 
            'email'                  => 'email|max:200',
            'telefone_celular'       => 'required|max:100|unique:contatos,telefone_celular',       
            'telefone_residencial'   => 'max:100',       
            'cep'                    => 'max:50',
            'rua'                    => 'required|max:255',
            'complemento'            => 'max:255',
            'numero'                 => 'max:50',
            'bairro'                 => 'max:80',
            'cidade'                 => 'max:50',
            'estado'                 => 'max:50',
            'pais'                   => 'max:50',
         
        ];
    }
}
