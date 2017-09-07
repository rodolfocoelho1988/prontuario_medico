<?php

namespace App\Models;

class Usuario extends Model
{
    /**
     * Usuario constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param array $usuario
     * @return bool|string
     */
    public function register(array $usuario)
    {
        $database = self::getInstance();
        $db = $database->prepare("INSERT INTO pessoa (nome, endereco_id, cpf, rg, data_nascimento, naturalidade, nacionalidade_id, email, senha) VALUES (:nome, :endereco_id, :cpf, :rg, :data_nascimento, :naturalidade, :nacionalidade_id, :email, :senha)");
        $db->bindParam(":nome", $usuario['nome']);
        $db->bindParam(":endereco_id", $usuario['endereco_id']);
        $db->bindParam(":cpf", $usuario['cpf']);
        $db->bindParam(":rg", $usuario['rg']);
        $db->bindParam(":data_nascimento", $usuario['data_nascimento']);
        $db->bindParam(":naturalidade", $usuario['naturalidade']);
        $db->bindParam(":nacionalidade_id", $usuario['nacionalidade_id']);
        $db->bindParam(":email", $usuario['email']);
        $db->bindParam(":senha", $usuario['senha']);
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
        $db = $database->prepare("DELETE FROM pessoa WHERE id = $id");
        $db->execute();
        return $db->rowCount();
    }
}