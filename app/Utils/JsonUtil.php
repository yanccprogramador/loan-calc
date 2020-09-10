<?php
namespace App\Utils;

use Illuminate\Support\Facades\Storage;

class JsonUtil{
    public static function getJsonFromStorage(string $name):Array{
        $json= Storage::disk('public')->get($name);
        return json_decode($json,true);
    }
}