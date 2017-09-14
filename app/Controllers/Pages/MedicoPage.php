<?php

namespace App\Controllers\Pages;

use App\Controllers\EspecialidadeController;
use App\Controllers\EstadoController;
use App\Controllers\GrupoController;
use App\Controllers\MedicoController;
use App\Controllers\MenuController;
use App\Controllers\NacionalidadeController;
use Klein\Request;

class MedicoPage
{
    private $request;
    private $medico;
    private $menu;
    private $grupo;
    private $nacionalidade;
    private $estado;
    private $especialidade;

    /**
     * MedicoPage constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Página de listagem de médico
     * @return array
     */
    public function index()
    {
        $this->medico = new MedicoController();
        $this->menu = new MenuController();
        $this->grupo = new GrupoController();

        $array = [
            "medicos" => $this->medico->getAll(),
            "menus" => $this->menu->get(),
            "grupos" => $this->grupo->get(),
            "request" => $this->request
        ];

        return $array;
    }

    /**
     * Página de cadastrar um médico
     * @return array
     */
    public function cadastrar()
    {
        $this->nacionalidade = new NacionalidadeController();
        $this->estado = new EstadoController();
        $this->menu = new MenuController();
        $this->grupo = new GrupoController();
        $this->especialidade = new EspecialidadeController();
        $array = [
            "nacionalidades" => $this->nacionalidade->getAll(),
            "estados" => $this->estado->getAll(),
            "menus" => $this->menu->get(),
            "grupos" => $this->grupo->get(),
            "request" => $this->request,
            "especialidades" => $this->especialidade->getAll()
        ];

        return $array;
    }
}