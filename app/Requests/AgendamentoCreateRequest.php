<?php

namespace App\Requests;

use Valitron\Validator;

class AgendamentoCreateRequest
{
    public static function rules(array $request)
    {
        $v = new Validator($request);
        $v->rule('required', ['dia', 'hora', 'medico_id', 'paciente_id'])->message("O campo {field} é obrigatório.");
        $v->rule('lengthMax', 'descricao', '1000')->message("O campo {field} precisa ter no máximo 1000 characteres.");

        $v->labels([
            'dia' => 'dia',
            'hora' => 'hora',
            'medico_id' => 'medico',
            'paciente_id' => 'paciente',
            'descricao' => 'descrição'
        ]);
        if($v->validate())
            return true;
        else
            return $v->errors();
    }
}