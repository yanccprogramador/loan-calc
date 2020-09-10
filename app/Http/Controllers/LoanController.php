<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoanRequest;
use App\Utils\JsonUtil;


class LoanController extends Controller
{
    //
    public function calculate(LoanRequest $request)
    {
        $payload = $request->all();
        $taxs = JsonUtil::getJsonFromStorage('taxas_instituicoes.json');

        $response = $this->getCalculatedTaxs($taxs, $payload);
        if (count($response) == 0) {
            return response()->json(['mensagem' => 'Não há empréstimos disponíveis'], 404);
        }
        return $response;
    }

    public function getCalculatedTaxs($taxs, $payload)
    {
        $response = [];
        foreach ($taxs as $tax) {
            if ($this->notValid($tax, $payload)) {
                continue;
            }
            if (!isset($response[$tax['instituicao']])) {
                $response[$tax['instituicao']] = [];
            }
            array_push($response[$tax['instituicao']], array(
                'taxa' => $tax['taxaJuros'],
                'numero_parcelas' => $tax['parcelas'],
                'convenio' => $tax['convenio'],
                'valor_parcela' => round($payload['valor_emprestimo'] * $tax['coeficiente'], 2)
            ));
        }
        return $response;
    }

    public function notValid(array $tax, array $payload)
    {
        return (isset($payload['instituicoes']) && count($payload['instituicoes']) > 0
                && !in_array($tax['instituicao'], $payload['instituicoes']))
            || (isset($payload['convenios']) && count($payload['convenios']) > 0
                && !in_array($tax['convenio'], $payload['convenios']))
            || (isset($payload['parcela']) && $payload['parcela'] != $tax['parcelas']);
    }
}
