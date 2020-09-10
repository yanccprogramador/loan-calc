<?php

namespace App\Http\Controllers;

use App\Utils\JsonUtil;

class InstitutionController extends Controller
{
    //
    public function index(){
        return JsonUtil::getJsonFromStorage('instituicoes.json');
    }
}
