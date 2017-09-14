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

    /**
     * @return array
     */
    public function getAll()
    {
        $db = self::getInstance()->prepare("SELECT * FROM especialidade");
        $db->execute();
        return $db->fetchAll(\PDO::FETCH_CLASS);
    }

    /**
     * @param array $especialidades
     * @param int $medico
     * @return array
     */
    public function synchronize(array $especialidades, int $medico)
    {

        $especialidades_ids = [];
        $db = self::getInstance();
        $delete = $db->prepare("DELETE FROM medico_especialidade WHERE medico_id = :medico");
        $delete->bindParam(":medico", $medico);
        $delete->execute();

        foreach($especialidades as $key => $especialidade) {
            $insert = $db->prepare("INSERT INTO medico_especialidade (especialidade_id, medico_id) VALUES (:especialidade_id, :medico_id)");
            $insert->bindParam(":especialidade_id", $especialidade);
            $insert->bindParam(":medico_id", $medico);
            $insert->execute();
            $especialidades_ids[$key] = $especialidade;
        }

        return $especialidades_ids;
    }
}