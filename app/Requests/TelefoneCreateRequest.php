<?php

namespace App\Requests;

use Valitron\Validator;

class TelefoneCreateRequest
{
    public static function rules(array $request)
    {
        $v = new Validator($request);
        $v->rule('required', ['tipo', 'numero'])->message("O campo {field} é obrigatório.");
        $v->rule('numeric', ['tipo'])->message("O campo {field} precisa ser numeral.");
        $v->rule('lengthMin', ['numero'], 10)->message("O campo {field} precisa de no mínimo 10 números.");

        $v->labels([
            'tipo' => 'tipo',
            'numero' => 'numero',
        ]);
        if($v->validate())
            return true;
        else
            return $v->errors();
    }
}