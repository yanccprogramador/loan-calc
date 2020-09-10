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
            'valor_emprestimo' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'instituicoes' => 'nullable|array',
            'convenios' => 'nullable|array',
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
            'instituicoes.array' => 'Precisa ser do tipo array',
            'convenios.array' => 'Precisa ser do tipo array',
            'parcela.required' => 'Campo obrigatório',
            'parcela.numeric' => 'Campo tipo numérico',
        ];
    }
}
