<?php

namespace App\Http\Controllers;

use App\Utils\JsonUtil;

class HealthInsuranceController extends Controller
{
    //
    public function index(){
        return JsonUtil::getJsonFromStorage('convenios.json');
    }
}
