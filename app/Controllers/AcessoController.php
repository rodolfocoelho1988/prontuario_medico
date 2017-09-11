<?php

namespace App\Controllers;

use App\Models\Acesso;

class AcessoController extends Controller
{
    private $acesso;

    /**
     * AcessoController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->acesso = new Acesso();
    }

    /**
     * @param int $pessoa
     * @return array
     */
    public function get(int $pessoa)
    {
        @session_start();
        return $this->acesso->get($pessoa);
    }

}