<?php

namespace App\Requests;

use Valitron\Validator;

class UsuarioRegisterRequest
{
    public static function rules(array $request)
    {
        $v = new Validator($request);
        if(isset($request['email'])) {
            $v->rule('required', ['email'])->message("O campo {field} é obrigatório.");
        }

        $v->rule('required', ['nome', 'cpf', 'rg', 'data_nascimento', 'nacionalidade_id', 'senha'])->message("O campo {field} é obrigatório.");
        $v->rule('numeric', ['cpf', 'nacionalidade_id'])->message("O campo {field} precisa ser número.");
        $v->rule('lengthMin', ['cpf'], '11')->message("O campo {field} precisa ter 11 characteres.");
        $v->rule('lengthMin', ['nome', 'senha', 'rg'], '8')->message("O campo {field} precisa ter no mínimo 8 characteres.");
        $v->rule('lengthMax', 'nome', '100')->message("O campo {field} precisa ter no máximo 100 characteres.");
        $v->rule('lengthMax', 'cpf', '11')->message("O campo {field} precisa ter no máximo 11 characteres.");
        $v->rule('lengthMax', 'rg', '20')->message("O campo {field} precisa ter no máximo 20 characteres.");
        $v->rule('lengthMax', ['naturalidade', 'email', 'senha'], '45')->message("O campo {field} precisa ter no máximo 45 characteres.");

        $v->labels([
            'nome' => 'nome',
            'cpf' => 'CPF',
            'rg' => 'RG',
            'data_nascimento' => 'data de nascimento',
            'nacionalidade_id' => 'nacionalidade',
            'senha' => 'senha',
            'email' => 'email',
            'naturalidade' => 'naturalidade'
        ]);
        if($v->validate())
            return true;
        else
            return $v->errors();
    }
}