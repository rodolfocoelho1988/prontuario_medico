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
        $db = self::getInstance()->prepare("SELECT * FROM especialidade WHERE medico_id = $medico");
        $db->execute();
        return $db->fetchAll(\PDO::FETCH_CLASS);
    }

}