<?php

namespace App\Controllers;

use App\Models\Medico;
use App\Models\Paciente;
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
     * Login do usuário
     * @return array
     */
	public function login(\Klein\Response $response)
    {
        $user = $_POST['user'];
        $rules = UsuarioLoginRequest::rules($user);
        if($rules !== true) {
            $response->code(302);
            $this->setResponse($rules);
        } else {
            if(isset($user['crm'])) {
                $medico = new Medico();
                if($user = $medico->login($user['crm'], $user['password'])) {
                    @session_start();
                    $_SESSION['user'] = $user;
                    $this->setResponse(["Médico logado com sucesso!"]);
                }
                else {
                    $response->code(302);
                    $this->setResponse(["Falha ao autenticar os seus dados!"]);
                }
            } else {
                $paciente = new Paciente();
                if($user = $paciente->login($user['email'], $user['password'])) {
                    @session_start();
                    $_SESSION['user'] = $user;
                    $this->setResponse(["Paciente logado com sucesso!"]);
                }
                else {
                    $response->code(302);
                    $this->setResponse(["Falha ao autenticar os seus dados!"]);
                }
            }
        }


        return json_encode($this->getResponse());
    }
}