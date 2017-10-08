<?php

namespace App\Controllers\MedicalRecords;

use App\Controllers\Controller;
use App\Models\MedicalRecords\Evolucao;
use App\Requests\PrescricaoSaveRequest;
use Klein\Response;

class EvolucaoController extends Controller
{
    private $evolucao;

    /**
     * EvolucaoController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->evolucao = new Evolucao();
    }

    /**
     * Retona os dados da ficha de Hipotese do Evolução do Paciente especificado
     * @param int $agendamento
     * @return mixed
     */
    public function byAgendamento(int $agendamento)
    {
        return $this->evolucao->byAgendamento($agendamento);
    }

    /**
     * Cria ou atualiza uma ficha de evolução do paciente;
     * @param Response $response
     * @return array
     */
    public function save(Response $response)
    {
        $evolucao = $_POST['evolucao'];

        $rules = PrescricaoSaveRequest::rules($evolucao);
        if($rules !== true) {
            $response->code(302);
            $this->setResponse($rules);
        } else {
            if($this->byAgendamento($_POST['agendamento']) != false) {
                try {
                    $this->evolucao->update($evolucao, $_POST['agendamento']);
                    $this->setResponse(["Ficha de Evolução do Paciente atualizada com sucesso!"]);
                } catch (\Exception $exception) {
                    $response->code(302);
                    $this->setResponse(["errors" => ["save" => "Falha ao atualizar a Ficha de Evolução do Paciente"]]);
                }
            } else {
                try {
                    $this->evolucao->create($evolucao, $_POST['agendamento']);
                    $this->setResponse(["Ficha de Evolução do Paciente criada com sucesso!"]);
                } catch (\Exception $exception) {
                    $response->code(302);
                    $this->setResponse(["errors" => ["save" => "Falha ao criar a Ficha de Evolução do Paciente"]]);
                }
            }
        }

        return $this->getResponse();
    }
}