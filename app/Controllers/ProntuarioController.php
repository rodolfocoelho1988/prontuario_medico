<?php

namespace App\Controllers;

use App\Models\Prontuario;

class ProntuarioController extends Controller
{
    private $prontuario;

    /**
     * ProntuarioController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->prontuario = new Prontuario();
    }
}