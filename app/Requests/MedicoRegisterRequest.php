<?php

namespace App\Requests;

use Valitron\Validator;

class MedicoRegisterRequest
{
    public static function rules(array $request)
    {
        $v = new Validator($request);
        $v->rule('required', ['crm'])->message("O campo {field} é obrigatório.");
        $v->rule('lengthMin', ['crm'], '5')->message("O campo {field} precisa ter no mínimo 5 characteres.");
        $v->rule('lengthMax', ['crm'], '45')->message("O campo {field} precisa ter no máximo 45 characteres.");

        $v->labels([
            'crm' => 'CRM'
        ]);
        if($v->validate())
            return true;
        else
            return $v->errors();
    }
}