<?php

namespace App\Models;

class Menu extends Model
{
    /**
     * Menu constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param int $grupo
     * @return array
     */
    public function get(int $grupo)
    {
        $db = self::getInstance()->prepare("SELECT t1.id, t1.nome, t1.class, t1.url, t1.icone, t3.nome AS grupo, t2.grupo_id FROM menu AS t1 INNER JOIN grupo_menu AS t2 ON (t2.menu_id = t1.id) INNER JOIN grupo AS t3 ON (t3.id = t2.grupo_id) WHERE t3.id = $grupo AND ISNULL(t1.pai_id)");
        $db->execute();
        $menus = $db->fetchAll(\PDO::FETCH_CLASS);

        foreach($menus as $key => $menu) {
            $menus[$key]->filhos = $this->filho($menu->grupo_id, $menu->id);
        }

        return $menus;
    }

    /**
     * @param int $pai
     * @return array
     */
    public function filho(int $grupo, int $pai)
    {
        $db = self::getInstance()->prepare("SELECT t1.* FROM menu AS t1 INNER JOIN grupo_menu AS t2 ON (t2.menu_id = t1.id) INNER JOIN grupo AS t3 ON (t3.id = t2.grupo_id) WHERE t3.id = $grupo AND t1.pai_id = $pai AND t1.pai_id <> 'NULL'");
        $db->execute();
        return $db->fetchAll(\PDO::FETCH_CLASS);
    }

}