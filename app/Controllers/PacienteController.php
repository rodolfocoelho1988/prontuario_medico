<?php

namespace App\Controllers;

use App\Models\Endereco;
use App\Models\Paciente;
use App\Models\Usuario;
use App\Requests\PacienteRegisterRequest;
use Klein\Response;

class PacienteController extends Controller
{
    private $paciente;

    /**
     * PacienteController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->paciente = new Paciente();
    }

    /**
     * Total de pacientes cadastrados na base de dados
     * @return mixed
     */
    public function getTotal()
    {
        return $this->paciente->getTotal();
    }

    /**
     * Efetua os procedimentos necessário para o cadastrado de um paciente
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

        $response->code(302);

        $address = $endereco->validation($_POST['endereco']);
        $user = $usuario->validation($_POST['usuario']);
        $paciente = $this->validation($_POST['paciente']);
        $telephone = $telefone->validation($_POST['telefone']);

        if($address["success"] === false) {
            $this->setResponse($address["msg"]);
        } else if($user["success"] === false) {
            $this->setResponse($user["msg"]);
        } else if($paciente["success"] === false) {
            $this->setResponse($paciente["msg"]);
        } else if($telephone["success"] === false) {
            $this->setResponse($telephone["msg"]);
        } else {

            $address = $address["msg"];
            $user = $user["msg"];
            $user["grupo_id"] = 1;
            $paciente = $paciente["msg"];
            $telephone = $telephone["msg"];

            try {
                $result["address"] = $endereco->create($address);
                $user['endereco_id'] = $result["address"];
                $result["user"] = $usuario->create($user);
                $telefone->synchronize($telephone, $result["user"]);

                $paciente["pessoa_id"] = $result["user"];
                empty($paciente["nome_pai"]) ? $paciente["nome_pai"] = NULL : '';
                empty($paciente["nome_mae"]) ? $paciente["nome_mae"] = NULL : '';
                empty($paciente["tipo_sanguineo"]) ? $paciente["tipo_sanguineo"] = NULL : '';

                $result["medico"] = $this->paciente->create($paciente);

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
     * @param array $paciente
     * @return array|string
     */
    private function validation(array $paciente)
    {
        $rules = PacienteRegisterRequest::rules($paciente);
        if($rules !== true)
            $this->setResponse(["success" => false, "msg" => $rules]);
        else
            $this->setResponse(["success" => true, "msg" => $paciente]);

        return $this->getResponse();
    }

    /**
     * Busca todos os pacientes
     * @return array
     */
    public function getAll()
    {
        return $this->paciente->getAll();
    }

    /**
     * Todos os pacientes ativo no sistema
     * @return array
     */
    public function getActive()
    {
        return $this->paciente->getActive();
    }
}