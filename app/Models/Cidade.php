<?php

namespace App\Models;

class Cidade extends Model
{
    /**
     * CidadeController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Busca todas as cidades de um determinado estado
     * @param int $estado
     * @return array
     */
    public function get(int $estado)
    {
        $db = self::getInstance()->prepare("SELECT * FROM cidade WHERE estado_id = :estado");
        $db->bindParam(":estado", $estado);
        $db->execute();
        return $db->fetchAll(\PDO::FETCH_CLASS);
    }
}