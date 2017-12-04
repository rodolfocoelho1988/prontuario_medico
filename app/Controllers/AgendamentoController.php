<?php

namespace App\Controllers;

use App\Models\Agendamento;
use App\Requests\AgendamentoCreateRequest;
use Klein\Request;
use Klein\Response;

class AgendamentoController extends Controller
{
    private $agendamento;

    /**
     * AgendamentoController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->agendamento = new Agendamento();
    }

    /**
     * Total de agendamento cadastrados na base de dados
     * @return mixed
     */
    public function getTotal()
    {
        return $this->agendamento->getTotal();
    }

    /**
     * Todos os agendamentos do dia de cada médico (nome, quantidade, inicio, fim)
     * @return array
     */
    public function getAllCountDoctorDay()
    {
        return $this->agendamento->getAllCountDoctorDay();
    }

    /**
     * @param Response $response
     * @return array
     */
    public function create(Response $response)
    {
        $agendamento = $_POST['agendamento'];
        $rules = AgendamentoCreateRequest::rules($agendamento);
        if($rules !== true) {
            $response->code(302);
            $this->setResponse($rules);
        } else {
            $agendamento['status'] = 1;
            $agendamento['horario'] = $agendamento['dia']." ".$agendamento['hora'];
            if($agendamento['horario'] < date('Y-m-d H:i')) {
                $response->code(302);
                $this->setResponse(["msg" => [["Não pode fazer um agendamento com a dia e hora inferior ao atual."]]]);
            } else {
                unset($agendamento['dia']);
                unset($agendamento['hora']);
                empty($agendamento['descricao']) ? $agendamento['descricao'] = NULL : '';
                try {
                    $this->agendamento->create($agendamento);
                    $this->setResponse(["Agendamento criado com sucesso!"]);
                } catch (\Exception $exception) {
                    $response->code(302);
                    $this->setResponse(["msg" => [["Erro ao criar o agendamento!"]]]);
                }
            }
        }

        return $this->getResponse();
    }

    /**
     * @return array
     */
    public function getAll()
    {
        return $this->agendamento->getAll();
    }

    /**
     * Todos os agendamentos por médico
     * @return array
     */
    public function byDoctor()
    {
        return $this->agendamento->byDoctor((int) $_SESSION['user']->medico_id);
    }

    /**
     * Dados do paciente de um determinado agendamento
     * @param Request $request
     * @return array
     */
    public function paciente(Request $request)
    {
        return $this->agendamento->paciente($request->id);
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return array|string
     */
    public function close(Request $request, Response $response)
    {
        if($this->agendamento->close($request->id)) {
            $this->setResponse(["msg" => "Agendamento fechado com sucesso."]);
        } else {
            $response->code(302);
            $this->setResponse(["msg" => [["É necessário preencher a ficha de Anamnese."]]]);
        }
        return $this->getResponse();
    }

    /**
     * Lista todos os agendamentos de um determinado paciente
     * @param Request $request
     * @return array
     */
    public function getByPaciente(Request $request)
    {
        return $this->agendamento->getByPaciente($request->id);
    }
}