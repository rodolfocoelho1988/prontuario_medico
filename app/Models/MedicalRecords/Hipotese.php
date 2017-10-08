<?php

namespace App\Models\MedicalRecords;

use App\Models\Model;

class Hipotese extends Model
{
    /**
     * Prescricao constructor.
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
        $db = $database->prepare("SELECT * FROM ficha_hipotese WHERE agendamento_id = :agendamento");
        $db->bindParam(":agendamento", $agendamento);
        $db->execute();
        return $db->fetch();
    }

    /**
     * @param array $hipotese
     * @param int $agendamento
     * @return int
     */
    public function update(array $hipotese, int $agendamento)
    {
        $database = self::getInstance();
        $db = $database->prepare("UPDATE ficha_hipotese SET hipotese_medico = :hipotese_medico, observacao = :observacao WHERE agendamento_id = :agendamento");
        $db->bindParam(":hipotese_medico", $hipotese['hipotese_medico']);
        $db->bindParam(":observacao", $hipotese['observacao']);
        $db->bindParam(":agendamento", $agendamento);
        $db->execute();
        return $db->rowCount();
    }

    /**
     * @param array $hipotese
     * @param int $agendamento
     * @return string
     */
    public function create(array $hipotese, int $agendamento)
    {
        $database = self::getInstance();
        $db = $database->prepare("INSERT INTO ficha_hipotese (hipotese_medico, observacao, agendamento_id) VALUES (:hipotese_medico, :observacao, :agendamento)");
        $db->bindParam(":hipotese_medico", $hipotese['hipotese_medico']);
        $db->bindParam(":observacao", $hipotese['observacao']);
        $db->bindParam(":agendamento", $agendamento);
        $db->execute();
        return $database->lastInsertId();
    }
}