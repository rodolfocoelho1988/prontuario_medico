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

}