<?php

namespace App\Controllers\MedicalRecords;

use App\Controllers\Controller;
use App\Models\MedicalRecords\Atestado;
use App\Requests\AtestadoSaveRequest;
use App\Requests\PrescricaoSaveRequest;
use Klein\Response;

class AtestadoController extends Controller
{
    private $atestado;

    /**
     * AtestadoController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->atestado = new Atestado();
    }

    /**
     * Retona os dados da ficha de Atestado Médico especificado
     * @param int $agendamento
     * @return mixed
     */
    public function byAgendamento(int $agendamento)
    {
        return $this->atestado->byAgendamento($agendamento);
    }

    /**
     * Cria ou atualiza uma ficha de atestado médico;
     * @param Response $response
     * @return array
     */
    public function save(Response $response)
    {
        $atestado = $_POST['atestado'];

        $rules = AtestadoSaveRequest::rules($atestado);
        if($rules !== true) {
            $response->code(302);
            $this->setResponse($rules);
        } else {
            if($this->byAgendamento($_POST['agendamento']) != false) {
                try {
                    $this->atestado->update($atestado, $_POST['agendamento']);
                    $this->setResponse(["Ficha de Atestado Médico atualizada com sucesso!"]);
                } catch (\Exception $exception) {
                    $response->code(302);
                    $this->setResponse(["errors" => ["save" => "Falha ao atualizar a Ficha de Atestado Médico"]]);
                }
            } else {
                try {
                    $this->atestado->create($atestado, $_POST['agendamento']);
                    $this->setResponse(["Ficha de Atestado Médico criada com sucesso!"]);
                } catch (\Exception $exception) {
                    $response->code(302);
                    $this->setResponse(["errors" => ["save" => "Falha ao criar a Ficha de Atestado Médico"]]);
                }
            }
        }

        return $this->getResponse();
    }
}