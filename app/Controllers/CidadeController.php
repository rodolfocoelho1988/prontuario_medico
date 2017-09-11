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
        $url = explode("/", $request->uri());
        foreach($_SESSION['user']->permissoes as $permissao) {
            if("/api/".$url[1]."/*" == $permissao->url) {
                return $this->cidade->get($request->id);
            }
        }
    }

}