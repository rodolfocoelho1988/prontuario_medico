<?php

namespace App\Requests;

use Valitron\Validator;

class HipoteseSaveRequest
{
    public static function rules(array $request)
    {
        $v = new Validator($request);
        $v->rule('required', ['hipotese_medico'])->message("O campo {field} é obrigatório.");
        $v->rule('lengthMax', 'hipotese_medico', '1000')->message("O campo {field} precisa ter no máximo 1000 characteres.");
        $v->rule('lengthMax', 'observacao', '1000')->message("O campo {field} precisa ter no máximo 1000 characteres.");

        $v->labels([
            'hipotese_medico' => 'hipótese médico',
            'observacao' => 'observacao',
        ]);
        if($v->validate())
            return true;
        else
            return $v->errors();
    }
}