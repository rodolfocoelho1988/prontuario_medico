<?php

namespace App\Controllers;

class CidadeController extends Controller
{
    private $cidade;

    /**
     * CidadeController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->cidade = new \App\Models\Cidade();
    }

    /**
     * Busca todas as cidades de um determinado estado.
     * @param int $estado
     * @return string
     */
    public function get(int $estado)
    {
        return json_encode($this->cidade->get($estado));
    }

}