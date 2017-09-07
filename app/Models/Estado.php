<?php

namespace App\Models;

class Estado extends Model
{
    /**
     * Estado constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Busca todas os estados
     * @return array
     */
    public function getAll() : array
    {
        $db = self::getInstance()->prepare("SELECT * FROM estado");
        $db->execute();
        return $db->fetchAll(\PDO::FETCH_CLASS);
    }

}