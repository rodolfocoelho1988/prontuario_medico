<?php

namespace App\Request;

use \Respect\Validation\Validator;

class UsuarioLoginResquest
{
    public static function rules(array $request)
    {
        $v = new Validator($request);
        $v->rule('required', ['password'])->message("O campo {field} é obrigatório.");
        $v->labels([
            'password' => '<strong>senha</strong>'
        ]);
        if($v->validate())
            return true;
        else
            return $v->errors();
    }
}