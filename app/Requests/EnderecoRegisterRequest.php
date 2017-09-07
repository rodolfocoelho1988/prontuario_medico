<?php

namespace App\Requests;

use Valitron\Validator;

class EnderecoRegisterRequest
{
    public static function rules(array $request)
    {
        $v = new Validator($request);
        $v->rule('required', ['rua', 'bairro', 'estado', 'cidade_id'])->message("O campo {field} é obrigatório.");
        $v->rule('integer', ['numero', 'estado', 'cidade_id'])->message("O campo {field} precisa ser número.");
        $v->rule('lengthMin', ['rua', 'bairro'], '5')->message("O campo {field} precisa ter no mínimo 5 characteres.");

        $v->labels([
            'rua' => 'rua',
            'bairro' => 'bairro',
            'estado' => 'estado',
            'cidade_id' => 'cidade',
            'numero' => 'numero'
        ]);
        if($v->validate())
            return true;
        else
            return $v->errors();
    }
}