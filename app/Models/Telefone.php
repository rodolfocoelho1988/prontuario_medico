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
     * @param int $pessoa
     * @return array
     */
    public function get(int $pessoa)
    {
        $database = self::getInstance();
        $db = $database->prepare("SELECT * FROM telefone WHERE pessoa_id = $pessoa");
        $db->execute();
        return $db->fetchAll(\PDO::FETCH_CLASS);
    }

    /**
     * @param array $telefones
     * @param int $usuario
     * @return array
     */
    public function synchronize(array $telefones, int $usuario)
    {
        $telefones_ids = [];
        $db = self::getInstance();
        $delete = $db->prepare("DELETE FROM telefone WHERE pessoa_id = :usuario");
        $delete->bindParam(":usuario", $usuario);
        $delete->execute();

        foreach($telefones as $key => $telefone) {
            $insert = $db->prepare("INSERT INTO telefone (tipo, numero, pessoa_id) VALUES (:tipo, :numero, :pessoa)");
            $insert->bindParam(":tipo", $telefone["tipo"]);
            $insert->bindParam(":numero", $telefone["numero"]);
            $insert->bindParam(":pessoa", $usuario);
            $insert->execute();
            $telefones_ids[$key] = $telefone;
        }

        return $telefones_ids;
    }
}