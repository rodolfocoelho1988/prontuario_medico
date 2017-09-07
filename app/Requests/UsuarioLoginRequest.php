<?php

namespace App\Requests;

use \Valitron\Validator;

class UsuarioLoginRequest
{
    public static function rules(array $request)
    {
        $v = new Validator($request);
        isset($request['crm']) ? $campo = 'crm' : $campo = 'email';
        $v->rule('required', ['password', 'type', $campo])->message("O campo {field} é obrigatório.");
        $campo === "email" ? $v->rule('email', ['email'])->message("O campo {field} tem que ser válido.") : '';

        $v->labels([
            'password' => 'senha',
            'type' => 'perfil',
            $campo => $campo
        ]);
        if($v->validate())
            return true;
        else
            return $v->errors();
    }
}