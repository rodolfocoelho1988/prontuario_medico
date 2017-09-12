<?php

namespace App\Controllers\Pages;

use App\Controllers\EstadoController;
use App\Controllers\GrupoController;
use App\Controllers\MenuController;
use App\Controllers\NacionalidadeController;
use App\Controllers\PacienteController;
use Klein\Request;

class PacientePage
{
    private $request;
    private $paciente;
    private $menu;
    private $grupo;
    private $nacionalidade;
    private $estado;

    /**
     * PacientePage constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Página de listagem de paciente
     * @return array
     */
    public function index()
    {
        $this->paciente = new PacienteController();
        $this->menu = new MenuController();
        $this->grupo = new GrupoController();

        $array = [
            "pacientes" => $this->paciente->getAll(),
            "menus" => $this->menu->get(),
            "grupos" => $this->grupo->get(),
            "request" => $this->request
        ];

        return $array;
    }

    /**
     * Página de cadastrar um paciente
     * @return array
     */
    public function cadastrar()
    {
        $this->nacionalidade = new NacionalidadeController();
        $this->estado = new EstadoController();
        $this->menu = new MenuController();
        $this->grupo = new GrupoController();
        $array = [
            "nacionalidades" => $this->nacionalidade->getAll(),
            "estados" => $this->estado->getAll(),
            "menus" => $this->menu->get(),
            "grupos" => $this->grupo->get(),
            "request" => $this->request
        ];

        return $array;
    }
}