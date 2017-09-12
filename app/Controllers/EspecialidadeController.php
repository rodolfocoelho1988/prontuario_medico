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
}