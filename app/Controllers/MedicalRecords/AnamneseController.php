<?php

namespace App\Controllers\MedicalRecords;

use App\Controllers\Controller;
use App\Models\MedicalRecords\Anamnese;
use Klein\Request;

class AnamneseController extends Controller
{
    private $anamnese;

    /**
     * AnamneseController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->anamnese = new Anamnese();
    }

    public function byAgendamento(Request $request)
    {
        return $this->anamnese->byAgendamento($request->agendamento);
    }
}