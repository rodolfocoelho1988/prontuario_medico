<?php

namespace App\Controllers;

use App\Models\Endereco;
use App\Models\Medico;
use App\Models\Usuario;
use App\Requests\MedicoRegisterRequest;
use Klein\Response;

class MedicoController extends Controller
{
    private $medico;

    /**
     * MedicoController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->medico = new Medico();
    }

    /**
     * Total de médicos cadastrados na base de dados
     * @return mixed
     */
    public function getTotal()
    {
        return $this->medico->getTotal();
    }

    /**
     * Primeiro cadastra endereço, usuario, medico
     */
    public function register(Response $response)
    {
        $endereco = new EnderecoController();
        $pessoa = $_POST['usuario'];

        $endereco = $endereco->register($_POST['endereco']);

        if($endereco["success"] !== true) {
            $response->code(302);
            $this->setResponse($endereco["msg"]);
        } else {
            $usuario['endereco_id'] = $endereco["msg"];
            $usuarioObj = new UsuarioController();
            $pessoa = $usuarioObj->register($pessoa);
            if($pessoa["success"] !== true) {
                $response->code(302);
                // Se não cadastrou a pessoa, preciso deletar o endereço que foi salvo no banco de dados
                Endereco::delete($usuario['endereco_id']);
                $this->setResponse($pessoa["msg"]);
            } else {
                $medico = [
                    'crm' => $_POST['medico']['crm'],
                    'pessoa_id' => $pessoa['msg']
                ];
                $rules = MedicoRegisterRequest::rules($medico);
                if($rules !== true) {
                    $response->code(302);
                    $this->setResponse($rules);
                    Endereco::delete($usuario['endereco_id']);
                    Usuario::delete($medico['pessoa_id']);
                } else {
                    if($this->medico->valueExist("medico", "crm", $medico['crm'])) {
                        $this->setResponse(["msg" => [["CRM já cadastrado!"]]]);
                        Endereco::delete($usuario['endereco_id']);
                        Usuario::delete($medico['pessoa_id']);
                    }
                    if($this->medico->register($medico)) {
                        $this->setResponse(["Médico cadastrado com sucesso!"]);
                    } else {
                        $response->code(302);
                        $this->setResponse(["msg" => [["Falha ao cadastrar o médico!"]]]);
                        Endereco::delete($usuario['endereco_id']);
                        Usuario::delete($medico['pessoa_id']);
                    }
                }
            }
        }

        return $this->getResponse();
    }
}