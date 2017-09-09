<?php

namespace App\Requests;

use Valitron\Validator;

class PacienteRegisterRequest
{
    public static function rules(array $request)
    {
        $v = new Validator($request);
        $v->rule('lengthMin', ['nome_pai', 'nome_mae'], '10')->message("O campo {field} precisa ter no mínimo 10 characteres.");
        $v->rule('lengthMax', ['nome_pai', 'nome_mae'], '100')->message("O campo {field} precisa ter no máximo 100 characteres.");
        $v->rule('lengthMax', 'tipo_sanguineo', '3')->message("O campo {field} precisa ter no máximo 3 characteres.");

        $v->labels([
            'nome_pai' => 'nome do pai',
            'nome_mae' => 'nome do pai',
            'tipo_sanguineo' => 'tipo sanguíneo',
        ]);
        if($v->validate())
            return true;
        else
            return $v->errors();
    }
}