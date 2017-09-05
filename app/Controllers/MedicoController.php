<?php

namespace App\Controllers;

use App\Models\Medico;

class MedicoController extends Controller
{
    private $medico;

    /**
     * MedicoController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->medico = new Medico();
    }

    /**
     * Total de médicos cadastrados na base de dados
     * @return mixed
     */
    public function getTotal()
    {
        return $this->medico->getTotal();
    }

}