<?php

namespace App\Requests;

use Valitron\Validator;

class AnamneseSaveRequest
{
    public static function rules(array $request)
    {
        $v = new Validator($request);
        $v->rule('required', ['queixa_principal', 'alergias', 'diabetes', 'hepatite', 'gravidez', 'problemas_de_cicatrizacao'])->message("O campo {field} é obrigatório.");
        $v->rule('lengthMax', 'queixa_principal', '1000')->message("O campo {field} precisa ter no máximo 1000 characteres.");
        $v->rule('lengthMax', 'historico', '1000')->message("O campo {field} precisa ter no máximo 1000 characteres.");
        $v->rule('lengthMax', 'problemas_renais', '1000')->message("O campo {field} precisa ter no máximo 1000 characteres.");
        $v->rule('lengthMax', 'problemas_articulares', '1000')->message("O campo {field} precisa ter no máximo 1000 characteres.");
        $v->rule('lengthMax', 'problemas_cardiacos', '1000')->message("O campo {field} precisa ter no máximo 1000 characteres.");
        $v->rule('lengthMax', 'problemas_respiratorios', '1000')->message("O campo {field} precisa ter no máximo 1000 characteres.");
        $v->rule('lengthMax', 'problemas_gastricos', '1000')->message("O campo {field} precisa ter no máximo 1000 characteres.");

        $v->labels([
            'queixa_principal' => 'queixa principal',
            'historico' => 'histórico',
            'problemas_renais' => 'problemas renais',
            'problemas_articulares' => 'problemas articulares',
            'problemas_cardiacos' => 'problemas cardiacos',
            'problemas_respiratorios' => 'problemas respiratórios',
            'problemas_gastricos' => 'problemas gástricos',
            'alergias' => 'alergias',
            'diabetes' => 'diabetes',
            'gravidez' => 'gravidez',
            'hepatite' => 'hepatite',
            'problemas_de_cicatrizacao' => 'problemas de cicatrização'
        ]);
        if($v->validate())
            return true;
        else
            return $v->errors();
    }
}