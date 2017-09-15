<?php

namespace App\Controllers;

use App\Models\Endereco;
use App\Models\Especialidade;
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
     * @param array $medico
     * @return array|string
     */
    private function validation(array $medico)
    {
        $rules = MedicoRegisterRequest::rules($medico);
        if($rules !== true) {
            if($this->medico->valueExist("medico", "crm", $medico['crm'])) {
                $this->setResponse(["success" => false, "msg" => "CRM já existe."]);
            } else {
                $this->setResponse(["success" => false, "msg" => $rules]);
            }
        } else {
            $this->setResponse(["success" => true, "msg" => $medico]);
        }

        return $this->getResponse();
    }

    /**
     * Efetua os procedimentos necessário para o cadastrado de um médico
     * @param Response $response
     * @return array|string
     */
    public function create(Response $response)
    {
        /**
         * Validação dos campos;
         */
        $endereco = new EnderecoController();
        $usuario = new UsuarioController();
        $telefone = new TelefoneController();
        $especialidade = new EspecialidadeController();

        $response->code(302);

        $address = $endereco->validation($_POST['endereco']);
        $user = $usuario->validation($_POST['usuario']);
        $doctor = $this->validation($_POST['medico']);
        $telephone = $telefone->validation($_POST['telefone']);

        if($address["success"] === false) {
            $this->setResponse($address["msg"]);
        } else if($user["success"] === false) {
            $this->setResponse($user["msg"]);
        } else if($doctor["success"] === false) {
            $this->setResponse($doctor["msg"]);
        } else if($telephone["success"] === false) {
            $this->setResponse($telephone["msg"]);
        } else {

            $address = $address["msg"];
            $user = $user["msg"];
            $user["grupo_id"] = 3;
            $doctor = $doctor["msg"];
            $telephone = $telephone["msg"];

            try {
                $result["address"] = $endereco->create($address);
                $user['endereco_id'] = $result["address"];
                $result["user"] = $usuario->create($user);
                $telefone->synchronize($telephone, $result["user"]);

                $medico = [
                    'crm' => $doctor['crm'],
                    'pessoa_id' => $result["user"]
                ];

                $result["medico"] = $this->medico->create($medico);

                if(isset($_POST['medico_especialidade'])) {
                    $especialidade->synchronize($_POST['medico_especialidade'], $result["medico"]);
                }

                $response->code(200);
                $this->setResponse(["Cadastrado com sucesso!"]);
            } catch (\Exception $exception) {
                $response->code(302);
                $this->setResponse(["error" => [["Código: ".$exception->getCode()." - Erro ao efetuar o cadastro"]]]);
            }
        }

        return $this->getResponse();
    }

    /**
     * Busca todos os médicos
     * @return array
     */
    public function getAll()
    {
        return $this->medico->getAll();
    }
}