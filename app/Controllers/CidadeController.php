<?php

namespace App\Controllers;

use Klein\Request;

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
     * usca todas as cidades de um determinado estado.
     * @param Request $request
     * @return array
     */
    public function get(Request $request)
    {
        return $this->cidade->get($request->id);
    }

}