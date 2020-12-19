<?php

namespace App\Helpers;


class Highlight
{
    public static function show($input, $paramsSearch, $field) // name
    {
        if($paramsSearch['value'] == "") return $input;
        if($paramsSearch['field'] == "all" || $paramsSearch['field'] == $field) {
            return preg_replace("/".preg_quote($paramsSearch['value'], "/")."/i", "<span class='highlight'>$0</span>", $input);
        }
        return $input;

    }
}
