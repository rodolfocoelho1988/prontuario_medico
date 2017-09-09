<?php

namespace App\Controllers;

use App\Models\Especialidade;

class EspecialidadeController extends Controller
{
    private $especialidade;

    /**
     * EspecialidadeController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->especialidade = new Especialidade();
    }

    /**
     * Busca todas as especialidades de um determinado médico
     * @param int $medico
     * @return array
     */
    public function get(int $medico)
    {
        return $this->especialidade->get($medico);
    }
}