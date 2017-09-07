<?php

namespace App\Models;

class Nacionalidade extends Model
{
    /**
     * NacionalidadeController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Busca todas as nacionalidade
     * @return array
     */
    public function getAll() : array
    {
        $db = self::getInstance()->prepare("SELECT * FROM pais");
        $db->execute();
        return $db->fetchAll(\PDO::FETCH_CLASS);
    }

}