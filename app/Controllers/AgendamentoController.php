<?php

namespace App\Controllers;

use App\Models\Agendamento;

class AgendamentoController extends Controller
{
    private $agendamento;

    /**
     * AgendamentoController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->agendamento = new Agendamento();
    }

    /**
     * Total de agendamento cadastrados na base de dados
     * @return mixed
     */
    public function getTotal()
    {
        return $this->agendamento->getTotal();
    }

}