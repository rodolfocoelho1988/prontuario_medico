<?php

namespace App\Models;

class Prontuario extends Model
{
    /**
     * Prontuario constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param int $agendamento
     * @return int
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