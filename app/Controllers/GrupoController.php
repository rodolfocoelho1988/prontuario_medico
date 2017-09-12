<?php

namespace App\Controllers;

use App\Models\Grupo;

class GrupoController extends Controller
{
    private $grupo;

    /**
     * GrupoController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->grupo = new Grupo();
    }

    /**
     * Busca todas as rotas de um determinados grupo do usuário logado no sistema
     * @return array
     */
    public function get()
    {
        if(!isset($_SESSION['user']))
            header('Location: /login');
        else
            return $this->grupo->get($_SESSION['user']->grupo_id);
    }
}