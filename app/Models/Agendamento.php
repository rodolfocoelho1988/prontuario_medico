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
        $db = $db->prepare("SELECT t3.nome as medico, count(t1.id) as qtd, MIN(t1.horario) as inicio, MAX(t1.horario) as fim  FROM agendamento as t1 INNER JOIN medico as t2 ON (t1.medico_id = t2.id) INNER JOIN pessoa as t3 ON (t2.pessoa_id = t3.id) WHERE DAY(t1.horario) = DAY(NOW()) AND MONTH(t1.horario) = MONTH(NOW()) AND YEAR(t1.horario) = YEAR(NOW()) AND status = 1 GROUP BY t1.medico_id");
        $db->execute();
        return $db->fetchAll();
    }
}