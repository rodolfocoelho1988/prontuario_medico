<?php

namespace App\Controllers;

class Dashboard
{
    private $paciente;
    private $medico;
    private $agendamento;

    /**
     * Informações da view index do dashboard
     * @return array
     */
    public function index()
    {
        $this->paciente = new PacienteController();
        $this->medico = new MedicoController();
        $this->agendamento = new AgendamentoController();

        $array = [
            "paciente" => $this->paciente->getTotal(),
            "medico" => $this->medico->getTotal(),
            "agendamentos" => [
                "total" => $this->agendamento->getTotal(),
                "day" => $this->agendamento->getAllCountDoctorDay()
            ]
        ];

        return $array;
    }
}