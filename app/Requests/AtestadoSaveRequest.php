<?php

namespace App\Requests;

use Valitron\Validator;

class AtestadoSaveRequest
{
    public static function rules(array $request)
    {
        $v = new Validator($request);
        $v->rule('required', ['informacao'])->message("O campo {field} é obrigatório.");
        $v->rule('lengthMax', 'informacao', '1000')->message("O campo {field} precisa ter no máximo 1000 characteres.");

        $v->labels([
            'informacao' => 'informação',
        ]);
        if($v->validate())
            return true;
        else
            return $v->errors();
    }
}