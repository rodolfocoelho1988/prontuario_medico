<?php

namespace App\Models;

class Grupo extends Model
{
    /**
     * Grupo constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Busco todas as rotas do meu grupo de usuário
     * @param int $grupo
     * @return array
     */
    public function get(int $grupo)
    {
        $db = self::getInstance()->prepare("SELECT t1.*, t3.nome as grupo FROM menu AS t1 INNER JOIN grupo_menu AS t2 ON (t1.id = t2.menu_id) INNER JOIN grupo AS t3 ON (t3.id = t2.grupo_id) WHERE t2.grupo_id = $grupo");
        $db->execute();
        return $db->fetchAll(\PDO::FETCH_CLASS);
    }
}