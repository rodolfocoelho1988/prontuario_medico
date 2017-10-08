<?php

namespace App\Models\MedicalRecords;

use App\Models\Model;

class Prescricao extends Model
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
        $db = $database->prepare("SELECT * FROM ficha_prescricao WHERE agendamento_id = :agendamento");
        $db->bindParam(":agendamento", $agendamento);
        $db->execute();
        return $db->fetch();
    }

    /**
     * @param array $prescricao
     * @param int $agendamento
     * @return int
     */
    public function update(array $prescricao, int $agendamento)
    {
        $database = self::getInstance();
        $db = $database->prepare("UPDATE ficha_prescricao SET informacao = :informacao WHERE agendamento_id = :agendamento");
        $db->bindParam(":informacao", $prescricao['informacao']);
        $db->bindParam(":agendamento", $agendamento);
        $db->execute();
        return $db->rowCount();
    }

    /**
     * @param array $prescricao
     * @param int $agendamento
     * @return string
     */
    public function create(array $prescricao, int $agendamento)
    {
        $database = self::getInstance();
        $db = $database->prepare("INSERT INTO ficha_prescricao (informacao, agendamento_id) VALUES (:informacao, :agendamento)");
        $db->bindParam(":informacao", $prescricao['informacao']);
        $db->bindParam(":agendamento", $agendamento);
        $db->execute();
        return $database->lastInsertId();
    }
}