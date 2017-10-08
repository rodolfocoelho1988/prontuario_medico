<?php

namespace App\Models\MedicalRecords;

use App\Models\Model;

class Atestado extends Model
{
    /**
     * Atestado constructor.
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
        $db = $database->prepare("SELECT * FROM ficha_atestado WHERE agendamento_id = :agendamento");
        $db->bindParam(":agendamento", $agendamento);
        $db->execute();
        return $db->fetch();
    }

    /**
     * @param array $atestado
     * @param int $agendamento
     * @return int
     */
    public function update(array $atestado, int $agendamento)
    {
        $database = self::getInstance();
        $db = $database->prepare("UPDATE ficha_atestado SET informacao = :informacao WHERE agendamento_id = :agendamento");
        $db->bindParam(":informacao", $atestado['informacao']);
        $db->bindParam(":agendamento", $agendamento);
        $db->execute();
        return $db->rowCount();
    }

    /**
     * @param array $atestado
     * @param int $agendamento
     * @return string
     */
    public function create(array $atestado, int $agendamento)
    {
        $database = self::getInstance();
        $db = $database->prepare("INSERT INTO ficha_atestado (informacao, agendamento_id) VALUES (:informacao, :agendamento)");
        $db->bindParam(":informacao", $atestado['informacao']);
        $db->bindParam(":agendamento", $agendamento);
        $db->execute();
        return $database->lastInsertId();
    }
}