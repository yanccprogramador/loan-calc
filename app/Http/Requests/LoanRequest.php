<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoanRequest extends FormRequest
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
            //
            'valor_emprestimo' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/|min:1',
            'instituicoes' => 'nullable|array|min:1',
            'convenios' => 'nullable|array|min:1',
            'parcela' => 'nullable|numeric'
        ];
    }

    public function messages()
    {
        return [
            //
            'valor_emprestimo.required' => 'Campo obrigatório',
            'valor_emprestimo.regex' => 'Campo tipo float',
            'valor_emprestimo.numeric' => 'Campo tipo float',
            'valor_emprestimo.min' => 'Precisa ser pelo menos 1',
            'instituicoes.array' => 'Precisa ser do tipo array',
            'instituicoes.min' => 'Precisa ter no minimo um elemento',
            'convenios.array' => 'Precisa ser do tipo array',
            'convenios.min' => 'Precisa ter no minimo um elemento',
            'parcela.required' => 'Campo obrigatório',
            'parcela.numeric' => 'Campo tipo numérico',
        ];
    }
}
