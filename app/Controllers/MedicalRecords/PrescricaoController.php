<?php

namespace App\Controllers\MedicalRecords;

use App\Controllers\Controller;
use App\Models\MedicalRecords\Prescricao;
use App\Requests\PrescricaoSaveRequest;
use Klein\Response;

class PrescricaoController extends Controller
{
    private $prescricao;

    /**
     * AnamneseController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->prescricao = new Prescricao();
    }

    /**
     * Retona os dados da ficha de Prescriçao Médica especificado
     * @param int $agendamento
     * @return mixed
     */
    public function byAgendamento(int $agendamento)
    {
        return $this->prescricao->byAgendamento($agendamento);
    }

    /**
     * Cria ou atualiza uma ficha de prescrição médica;
     * @param Response $response
     * @return array
     */
    public function save(Response $response)
    {
        $prescricao = $_POST['prescricao'];

        $rules = PrescricaoSaveRequest::rules($prescricao);
        if($rules !== true) {
            $response->code(302);
            $this->setResponse($rules);
        } else {
            if($this->byAgendamento($_POST['agendamento']) != false) {
                try {
                    $this->prescricao->update($prescricao, $_POST['agendamento']);
                    $this->setResponse(["Ficha de Prescrição Médica atualizada com sucesso!"]);
                } catch (\Exception $exception) {
                    $response->code(302);
                    $this->setResponse(["errors" => ["save" => "Falha ao atualizar a Ficha de Prescrição Médica"]]);
                }
            } else {
                try {
                    $this->prescricao->create($prescricao, $_POST['agendamento']);
                    $this->setResponse(["Ficha de Prescrição Médica criada com sucesso!"]);
                } catch (\Exception $exception) {
                    $response->code(302);
                    $this->setResponse(["errors" => ["save" => "Falha ao criar a Ficha de Prescrição Médica"]]);
                }
            }
        }

        return $this->getResponse();
    }
}