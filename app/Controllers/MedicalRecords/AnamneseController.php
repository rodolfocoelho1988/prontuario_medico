<?php

namespace App\Controllers\MedicalRecords;

use App\Controllers\Controller;
use App\Models\MedicalRecords\Anamnese;
use App\Requests\AnamneseSaveRequest;
use Klein\Request;
use Klein\Response;

class AnamneseController extends Controller
{
    private $anamnese;

    /**
     * AnamneseController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->anamnese = new Anamnese();
    }

    /**
     * Retona os dados da icha de Anamnese do Agendamento especificado
     * @param int $agendamento
     * @return mixed
     */
    public function byAgendamento(int $agendamento)
    {
        return $this->anamnese->byAgendamento($agendamento);
    }

    /**
     * Cria ou atualiza uma ficha de anamnese;
     * @param Response $response
     * @return array
     */
    public function save(Response $response)
    {
        $anamnese = $_POST['anamnese'];
        isset($anamnese['hepatite']) == false ? $anamnese['hepatite'] = 0 : $anamnese['hepatite'] = 1;
        isset($anamnese['gravidez']) == false ? $anamnese['gravidez'] = 0 : $anamnese['gravidez'] = 1;
        isset($anamnese['diabetes']) == false ? $anamnese['diabetes'] = 0 : $anamnese['diabetes'] = 1;
        isset($anamnese['problemas_de_cicatrizacao']) == false ? $anamnese['problemas_de_cicatrizacao'] = 0 : $anamnese['problemas_de_cicatrizacao'] = 1;

        $rules = AnamneseSaveRequest::rules($anamnese);
        if($rules !== true) {
            $response->code(302);
            $this->setResponse($rules);
        } else {
            if($this->byAgendamento($_POST['agendamento']) != false) {
                try {
                    $this->anamnese->update($anamnese, $_POST['agendamento']);
                    $this->setResponse(["Ficha de Anamnese atualizada com sucesso!"]);
                } catch (\Exception $exception) {
                    $response->code(302);
                    $this->setResponse(["errors" => ["save" => "Falha ao atualizar a Ficha de Anamnese"]]);
                }
            } else {
                try {
                    $this->anamnese->create($anamnese, $_POST['agendamento']);
                    $this->setResponse(["Ficha de Anamnese criada com sucesso!"]);
                } catch (\Exception $exception) {
                    $response->code(302);
                    $this->setResponse(["errors" => ["save" => "Falha ao criar a Ficha de Anamnese"]]);
                }
            }
        }

        return $this->getResponse();
    }
}