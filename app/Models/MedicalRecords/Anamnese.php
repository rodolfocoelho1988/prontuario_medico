<?php

namespace App\Models\MedicalRecords;

use App\Models\Model;

class Anamnese extends Model
{
    /**
     * Anamnese constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param int $agendamento
     * @return mixed
     */
    public function byAgendamento(int $agendamento)
    {
        $database = self::getInstance();
        $db = $database->prepare("SELECT * FROM ficha_anamnese WHERE agendamento_id = :agendamento");
        $db->bindParam(":agendamento", $agendamento);
        $db->execute();
        return $db->fetch();
    }
}