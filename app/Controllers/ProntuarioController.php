<?php

namespace App\Controllers;

use App\Models\Prontuario;
use Klein\Request;

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

    public function paciente(Request $request)
    {
        return $this->prontuario->paciente($request->id);
    }

}