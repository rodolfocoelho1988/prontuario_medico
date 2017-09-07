<?php

namespace App\Controllers;

class EstadoController extends Controller
{
    private $estado;

    /**
     * NacionalidadeController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->estado = new \App\Models\Estado();
    }

    public function getAll()
    {
        return $this->estado->getAll();
    }
}