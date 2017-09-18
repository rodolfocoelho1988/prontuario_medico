<?php

namespace App\Controllers\Pages;

use App\Controllers\AgendamentoController;
use App\Controllers\EstadoController;
use App\Controllers\GrupoController;
use App\Controllers\MedicoController;
use App\Controllers\MenuController;
use App\Controllers\NacionalidadeController;
use App\Controllers\PacienteController;
use App\Libs\Twig;
use Klein\Request;

class AgendamentoPage
{
    private $request;
    private $agendamento;
    private $medico;
    private $paciente;
    private $menu;
    private $grupo;
    private $nacionalidade;
    private $estado;

    /**
     * AgendamentoPage constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Página de listagem de agendamento
     * @param Twig $twig
     */
    public function index(Twig $twig)
    {
        $this->agendamento = new AgendamentoController();
        $this->menu = new MenuController();
        $this->grupo = new GrupoController();
        $array = [
            "menus" => $this->menu->get(),
            "grupos" => $this->grupo->get(),
            "request" => $this->request
        ];
        if(@$_SESSION['user']->grupo_id == 3) {
            $array["agendamentos"] = $this->agendamento->byDoctor();
            $file = "agendamento-medico.tpl.html";
        } else {
            $array["agendamentos"] = $this->agendamento->getAll();
            $file = "agendamento.tpl.html";
        }

        echo $twig->render($file, $array);
    }

    /**
     * Página de cadastrar um agendamento
     * @return array
     */
    public function cadastrar()
    {
        $this->medico = new MedicoController();
        $this->paciente = new PacienteController();
        $this->menu = new MenuController();
        $this->grupo = new GrupoController();
        $array = [
            "medicos" => $this->medico->getActive(),
            "pacientes" => $this->paciente->getActive(),
            "menus" => $this->menu->get(),
            "grupos" => $this->grupo->get(),
            "request" => $this->request
        ];

        return $array;
    }
}