<?php

namespace App\Controllers;

class NacionalidadeController extends Controller
{
    private $nacionalidade;

    /**
     * NacionalidadeController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->nacionalidade = new \App\Models\Nacionalidade();
    }

    public function getAll()
    {
        return $this->nacionalidade->getAll();
    }

}