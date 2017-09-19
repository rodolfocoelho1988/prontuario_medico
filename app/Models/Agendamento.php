<?php

namespace App\Models;

class Agendamento extends Model
{
    /**
     * Agendamento constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Total de agendamentos cadastrados
     * @return mixed
     */
    public function getTotal()
    {
        $db = self::getInstance();
        $db = $db->prepare("SELECT count(*) as count FROM agendamento WHERE status = true AND month(horario) = month(NOW())");
        $db->execute();
        return $db->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * Todos os agendamentos do dia de cada médico (nome, quantidade, inicio, fim)
     * @return array
     */
    public function getAllCountDoctorDay()
    {
        $db = self::getInstance();
        $db = $db->prepare("SELECT t3.nome as medico, count(t1.id) as qtd, DATE_FORMAT(MIN(t1.horario), '%H:%i') as inicio, DATE_FORMAT(MAX(t1.horario), '%H:%i') as fim  FROM agendamento as t1 INNER JOIN medico as t2 ON (t1.medico_id = t2.id) INNER JOIN pessoa as t3 ON (t2.pessoa_id = t3.id) WHERE DAY(t1.horario) = DAY(NOW()) AND MONTH(t1.horario) = MONTH(NOW()) AND YEAR(t1.horario) = YEAR(NOW()) AND status = 1 GROUP BY t1.medico_id");
        $db->execute();
        return $db->fetchAll();
    }

    /**
     * @param array $agendamento
     * @return string
     */
    public function create(array $agendamento)
    {
        $database = self::getInstance();
        $db = $database->prepare("INSERT INTO agendamento (horario, paciente_id, medico_id, descricao, status) VALUES (:horario, :paciente_id, :medico_id, :descricao, :status)");
        $db->bindParam(":horario", $agendamento['horario']);
        $db->bindParam(":paciente_id", $agendamento['paciente_id']);
        $db->bindParam(":medico_id", $agendamento['medico_id']);
        $db->bindParam(":descricao", $agendamento['descricao']);
        $db->bindParam(":status", $agendamento['status']);
        $db->execute();
        return $database->lastInsertId();
    }

    /**
     * @return array
     */
    public function getAll()
    {
        $db = self::getInstance();
        $db = $db->prepare("SELECT t3.nome as medico, t2.crm, t5.nome as paciente, t5.email, DATE_FORMAT(t1.horario, '%d-%m-%Y %H:%i') as horario FROM agendamento as t1 INNER JOIN medico as t2 ON (t1.medico_id = t2.id) INNER JOIN pessoa as t3 ON (t2.pessoa_id = t3.id) INNER JOIN paciente AS t4 ON (t4.id = t1.paciente_id) INNER JOIN pessoa t5 ON (t5.id = t4.pessoa_id) WHERE status = 1 AND t1.horario > CURDATE() ORDER BY t1.horario ASC");
        $db->execute();
        return $db->fetchAll();
    }

    /**
     * @param int $medico
     * @return array
     */
    public function byDoctor(int $medico)
    {
        $db = self::getInstance();
        $db = $db->prepare("SELECT t1.id, t1.descricao, t5.nome as paciente, t5.email, DATE_FORMAT(t1.horario, '%d-%m-%Y %H:%i') as horario FROM agendamento as t1 INNER JOIN medico as t2 ON (t1.medico_id = t2.id) INNER JOIN pessoa as t3 ON (t2.pessoa_id = t3.id) INNER JOIN paciente AS t4 ON (t4.id = t1.paciente_id) INNER JOIN pessoa t5 ON (t5.id = t4.pessoa_id) WHERE status = 1 AND t1.medico_id = $medico ORDER BY t1.horario ASC");
        $db->execute();
        return $db->fetchAll();
    }

    /**
     * @param int $agendamento
     * @return mixed
     */
    public function paciente(int $agendamento)
    {
        $database = self::getInstance();
        $db = $database->prepare("SELECT t2.nome, t2.email FROM paciente AS t1 INNER JOIN pessoa AS t2 ON (t1.pessoa_id = t2.id) INNER JOIN agendamento AS t3 ON (t3.paciente_id = t1.id) WHERE t3.id = :agendamento");
        $db->bindParam(":agendamento", $agendamento);
        $db->execute();
        return $db->fetch();
    }
}