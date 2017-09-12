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
        $endereco = new EnderecoController();
        $pessoa = $_POST['usuario'];

        $endereco = $endereco->create($_POST['endereco']);

        // Verifica e o cadastro do endereço deu algum erro;
        if($endereco["success"] !== true) {
            $response->code(302);
            $this->setResponse($endereco["msg"]);
        } else {
            $pessoa['endereco_id'] = $endereco["msg"];
            $pessoa['grupo_id'] = 1;
            $usuarioObj = new UsuarioController();
            // Faz o cadastro de uma pessoa no banco;
            $pessoa = $usuarioObj->create($pessoa);
            // Verifica se o cadastro deu algum erro;
            if($pessoa["success"] !== true) {
                $response->code(302);
                // Se não cadastrou a pessoa, preciso deletar o endereço que foi salvo no banco de dados
                Endereco::delete($endereco["msg"]);
                $this->setResponse($pessoa["msg"]);
            } else {
                $paciente = $_POST['paciente'];
                $paciente["pessoa_id"] = $pessoa['msg'];
                $rules = PacienteRegisterRequest::rules($paciente);
                // Verifico se todas as regras foram validadas;
                if($rules !== true) {
                    $response->code(302);
                    $this->setResponse($rules);
                    // Se as regras não foram validas, preciso remover o endereço e a pessoa
                    Usuario::delete($paciente['pessoa_id']);
                    Endereco::delete($endereco["msg"]);
                } else {
                    // Se os campos virem vazios, adicionar valor Nulo;
                    empty($paciente["nome_pai"]) ? $paciente["nome_pai"] = NULL : '';
                    empty($paciente["nome_mae"]) ? $paciente["nome_mae"] = NULL : '';
                    empty($paciente["tipo_sanguineo"]) ? $paciente["tipo_sanguineo"] = NULL : '';
                    if($paciente_id = $this->paciente->create($paciente)) {
                        // Se o médico cadastrou, vou adicionar os telefones;
                        $telefone = new TelefoneController();
                        $resultTelefone = $telefone->create($paciente["pessoa_id"]);
                        if($resultTelefone["success"] !== true) {
                            $response->code(302);
                            // Se as regras não foram validas, preciso remover o endereço e a pessoa e o médico
                            Paciente::delete($paciente_id);
                            Usuario::delete($paciente['pessoa_id']);
                            Endereco::delete($endereco["msg"]);
                            $this->setResponse($resultTelefone["msg"]);
                        } else {
                            $this->setResponse(["Paciente cadastrado com sucesso!"]);
                        }
                    } else {
                        $response->code(302);
                        // Se não cadastrou o paciente, preciso deletar o endereço e a pessoa;
                        $this->setResponse(["msg" => [["Falha ao cadastrar o paciente!"]]]);
                        Usuario::delete($paciente['pessoa_id']);
                        Endereco::delete($endereco["msg"]);
                    }
                }
            }
        }

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
}