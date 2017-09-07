<?php

namespace App\Models;

class Endereco extends Model
{
    /**
     * Endereco constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function register(array $endereco)
    {
        $database = self::getInstance();
        $db = $database->prepare("INSERT INTO endereco (rua, numero, bairro, complemento, cidade_id) VALUES (:rua, :numero, :bairro, :complemento, :cidade_id)");
        $db->bindParam(":rua", $endereco['rua']);
        $db->bindParam(":numero", $endereco['numero']);
        $db->bindParam(":bairro", $endereco['bairro']);
        $db->bindParam(":complemento", $endereco['complemento']);
        $db->bindParam(":cidade_id", $endereco['cidade_id']);
        $db->execute();
        if($db->rowCount())
            return $database->lastInsertId();
        return false;
    }

    /**
     * @param int $id
     * @return int
     */
    public static function delete(int $id)
    {
        $database = self::getInstance();
        $db = $database->prepare("DELETE FROM endereco WHERE id = $id");
        $db->execute();
        return $db->rowCount();
    }

}