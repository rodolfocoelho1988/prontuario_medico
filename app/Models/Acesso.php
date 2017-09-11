<?php

namespace App\Models;

class Acesso extends Model
{
    /**
     * Acesso constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param int $pessoa
     * @return array
     */
    public function get(int $pessoa)
    {
        $db = self::getInstance();
        $db = $db->prepare("SELECT t3.id, t3.url FROM pessoa AS t1 INNER JOIN acesso AS t2 ON (t2.pessoa_id = t1.id) INNER JOIN pagina AS t3 ON (t2.pagina_id = t3.id) WHERE t2.pessoa_id = $pessoa");
        $db->execute();
        return $db->fetchAll(\PDO::FETCH_CLASS);
    }

}