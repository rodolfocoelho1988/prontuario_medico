<?php

namespace App\Controllers\Pages;

use App\Controllers\AgendamentoController;
use App\Controllers\GrupoController;
use App\Controllers\MedicoController;
use App\Controllers\MenuController;
use App\Controllers\PacienteController;
use Klein\Request;

class IndexPage
{
    private $paciente;
    private $medico;
    private $agendamento;
    private $menu;
    private $grupo;

    /**
     * Informações da view index do dashboard
     * @return array
     */
    public function index(Request $request)
    {
        $this->paciente = new PacienteController();
        $this->medico = new MedicoController();
        $this->agendamento = new AgendamentoController();
        $this->menu = new MenuController();
        $this->grupo = new GrupoController();

        $index = [
            "paciente" => $this->paciente->getTotal(),
            "medico" => $this->medico->getTotal(),
            "agendamentos" => [
                "total" => $this->agendamento->getTotal(),
                "day" => $this->agendamento->getAllCountDoctorDay()
            ],
            "menus" => $this->menu->get(),
            "grupos" => $this->grupo->get(),
            "request" => $request
        ];

        return $index;
    }
}