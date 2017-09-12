<?php

namespace App\Models;

class Especialidade extends Model
{
    /**
     * Especialidade constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param int $medico
     * @return array
     */
    public function get(int $medico)
    {
        $db = self::getInstance()->prepare("SELECT t2.especialidade_id, t1.titulo FROM especialidade AS t1 INNER JOIN medico_especialidade AS t2 ON (t2.especialidade_id = t1.id) INNER JOIN medico AS t3 ON (t3.id = t2.medico_id) WHERE t3.id = $medico");
        $db->execute();
        return $db->fetchAll(\PDO::FETCH_CLASS);
    }

}