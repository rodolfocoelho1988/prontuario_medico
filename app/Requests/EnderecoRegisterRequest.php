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
        $v->rule('lengthMax', 'rua', '100')->message("O campo {field} precisa ter no máximo 100 characteres.");
        $v->rule('lengthMax', 'numero', '7')->message("O campo {field} precisa ter no máximo 7 characteres.");
        $v->rule('lengthMax', 'bairro', '50')->message("O campo {field} precisa ter no máximo 50 characteres.");
        $v->rule('lengthMax', 'complemento', '45')->message("O campo {field} precisa ter no máximo 45 characteres.");

        $v->labels([
            'rua' => 'rua',
            'bairro' => 'bairro',
            'estado' => 'estado',
            'cidade_id' => 'cidade',
            'numero' => 'numero',
            'complemento' => 'complemento'
        ]);
        if($v->validate())
            return true;
        else
            return $v->errors();
    }
}