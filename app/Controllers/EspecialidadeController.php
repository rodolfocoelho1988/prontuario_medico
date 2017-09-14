<?php

namespace App\Controllers;

use App\Models\Especialidade;
use Klein\Request;

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
     * @param Request $request
     * @return array
     */
    public function get(Request $request)
    {
        return $this->especialidade->get($request->id);
    }

    /**
     * Busca todas as especialidades que existe na base de dados
     * @return array
     */
    public function getAll()
    {
        return $this->especialidade->getAll();
    }

    /**
     * Faz a sincronização entre médico e especialidades, deleta todos e insere os novos;
     * @param array $especialidades
     * @param int $medico
     * @return array
     */
    public function synchronize(array $especialidades, int $medico)
    {
        return $this->especialidade->synchronize($especialidades, $medico);
    }
}