<?php

namespace App\Controllers;

use App\Models\Medico as Medico;
use App\Models\Paciente as Paciente;
use App\Models\Secretaria;
use App\Models\Usuario;
use App\Requests\UsuarioLoginRequest;

class UsuarioController extends Controller
{
	private $usuario;

    /**
     * UsuarioController constructor.
     */
    public function __construct()
	{
		parent::__construct();
		$this->usuario = new Usuario();
	}

    /**
     * Efetua o login e verifica qual é o tipo de usuário que está autenticando no sistema
     * @param \Klein\Response $response
     * @return string
     */
	public function login(\Klein\Response $response) : string
    {
        $user = $_POST['user'];
        $rules = UsuarioLoginRequest::rules($user);
        if($rules !== true) {
            $response->code(302);
            $this->setResponse($rules);
        } else {
            $user['password'] = $this->encryption($user['password']);
            if(isset($user['crm'])) {
                $class = new Medico();
                $column = 'crm';
            } else {
                $user["type"] == "paciente" ? $class = new Paciente() : $user["type"] == "secretaria" ? $class = new Secretaria() : $class = new Paciente();
                $column = 'email';
            }

            if($user = $class->login($user["$column"], $user["password"])) {
                    @session_start();
                    $_SESSION['user'] = $user;
                    $this->setResponse(["Logado com sucesso!"]);
            } else {
                    $response->code(302);
                    $this->setResponse(["error" => ["Falha ao autenticar os seus dados!"]]);
            }
        }

        return json_encode($this->getResponse());
    }

    /**
     * Transforma uma string para criptografia md5
     * @param string $string
     * @return string
     */
    private function encryption(string $string) : string
    {
	    return md5($string);
    }
}