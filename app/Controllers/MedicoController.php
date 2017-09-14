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
     * Efetua os procedimentos necessário para o cadastrado de um médico
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
            $pessoa['grupo_id'] = 3;
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
                $medico = [
                    'crm' => $_POST['medico']['crm'],
                    'pessoa_id' => $pessoa['msg']
                ];
                $rules = MedicoRegisterRequest::rules($medico);
                // Verifico se todas as regras foram validadas;
                if($rules !== true) {
                    $response->code(302);
                    $this->setResponse($rules);
                    // Se as regras não foram validas, preciso remover o endereço e a pessoa
                    Usuario::delete($medico['pessoa_id']);
                    Endereco::delete($endereco["msg"]);
                } else {
                    // Verifica se não existe outro médico com o mesmo CRM;
                    if($this->medico->valueExist("medico", "crm", $medico['crm'])) {
                        $this->setResponse(["msg" => [["CRM já cadastrado!"]]]);
                        // Se existe outro médico com o mesmo CRM, preciso deletar o endereço e a pessoa;
                        Usuario::delete($medico['pessoa_id']);
                        Endereco::delete($endereco["msg"]);
                    } else if($medico_id = $this->medico->register($medico)) {
                        // Se o médico cadastrou, vou adicionar os telefones;
                        $telefone = new TelefoneController();
                        $resultTelefone = $telefone->create($medico["pessoa_id"]);
                        if($resultTelefone["success"] !== true) {
                            $response->code(302);
                            // Se as regras não foram validas, preciso remover o endereço e a pessoa e o médico
                            Medico::delete($medico_id);
                            Usuario::delete($medico['pessoa_id']);
                            Endereco::delete($endereco["msg"]);
                            $this->setResponse($resultTelefone["msg"]);
                        } else {
                            $especialidade = new EspecialidadeController();
                            $especialidade->synchronize($_POST['medico_especialidade'], $medico_id);
                            $this->setResponse(["Médico cadastrado com sucesso!"]);
                        }
                    } else {
                        $response->code(302);
                        // Se não cadastrou o médico, preciso deletar o endereço e a pessoa;
                        $this->setResponse(["msg" => [["Falha ao cadastrar o médico!"]]]);
                        Usuario::delete($medico['pessoa_id']);
                        Endereco::delete($endereco["msg"]);
                    }
                }
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