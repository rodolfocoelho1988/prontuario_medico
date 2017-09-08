<?php

namespace App\Models;

class Telefone extends Model
{
    /**
     * Telefone constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param array $telefone
     * @param int $pessoa_id
     * @return int
     */
    public function create(array $telefone, int $pessoa_id)
    {
        $database = self::getInstance();
        $db = $database->prepare("INSERT INTO telefone (tipo, numero, pessoa_id) VALUES (:tipo, :numero, :pessoa_id)");
        $db->bindParam(":tipo", $telefone['tipo']);
        $db->bindParam(":numero", $telefone['numero']);
        $db->bindParam(":pessoa_id", $pessoa_id);
        $db->execute();
        return $db->rowCount();
    }

    /**
     * @param int $id
     * @return int
     */
    public static function delete(int $id)
    {
        $database = self::getInstance();
        $db = $database->prepare("DELETE FROM telefone WHERE id = $id");
        $db->execute();
        return $db->rowCount();
    }
}