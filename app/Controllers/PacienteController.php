<?php

namespace App\Controllers;

use App\Models\Paciente;

class PacienteController extends Controller
{
    private $pacinte;

    /**
     * PacienteController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->pacinte = new Paciente();
    }

    /**
     * Total de pacientes cadastrados na base de dados
     * @return mixed
     */
    public function getTotal()
    {
        return $this->pacinte->getTotal();
    }

}