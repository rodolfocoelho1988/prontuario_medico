<?php

namespace App\Controllers\MedicalRecords;

use App\Controllers\Controller;
use App\Models\MedicalRecords\Hipotese;
use App\Requests\HipoteseSaveRequest;
use Klein\Response;

class HipoteseController extends Controller
{
    private $hipotese;

    /**
     * HipoteseController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->hipotese = new Hipotese();
    }

    /**
     * Retona os dados da ficha de Hipotese do Agendamento especificado
     * @param int $agendamento
     * @return mixed
     */
    public function byAgendamento(int $agendamento)
    {
        return $this->hipotese->byAgendamento($agendamento);
    }

    /**
     * Cria ou atualiza uma ficha de hipotese;
     * @param Response $response
     * @return array
     */
    public function save(Response $response)
    {
        $hipotese = $_POST['hipotese'];

        $rules = HipoteseSaveRequest::rules($hipotese);
        if($rules !== true) {
            $response->code(302);
            $this->setResponse($rules);
        } else {
            if($this->byAgendamento($_POST['agendamento']) != false) {
                try {
                    $this->hipotese->update($hipotese, $_POST['agendamento']);
                    $this->setResponse(["Ficha de Hipotese Diagnostico atualizada com sucesso!"]);
                } catch (\Exception $exception) {
                    $response->code(302);
                    $this->setResponse(["errors" => ["save" => "Falha ao atualizar a Ficha de Hipotese Diagnostico"]]);
                }
            } else {
                try {
                    $this->hipotese->create($hipotese, $_POST['agendamento']);
                    $this->setResponse(["Ficha de Hipotese Diagnostico criada com sucesso!"]);
                } catch (\Exception $exception) {
                    $response->code(302);
                    $this->setResponse(["errors" => ["save" => "Falha ao criar a Ficha de Hipotese Diagnostico"]]);
                }
            }
        }

        return $this->getResponse();
    }
}