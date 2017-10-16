<?php

namespace App\Models;

class Paciente extends Model
{
    /**
     * Paciente constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Total de pacientes cadastrados
     * @return mixed
     */
    public function getTotal()
    {
        $db = self::getInstance();
        $db = $db->prepare("SELECT count(*) as count FROM paciente");
        $db->execute();
        return $db->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * Efetuar login
     * @param string $login
     * @param string $password
     * @return array|bool
     */
    public function login(string $login, string $password)
    {
        $db = self::getInstance();
        // Preciso definir o que vou listar do banco do paciente;
        $db = $db->prepare("SELECT t1.*, t2.* FROM pessoa as t1 INNER JOIN paciente as t2 ON (t2.pessoa_id = t1.id) WHERE t1.email = :login AND t1.senha = :password AND t1.ativo = 1");
        $db->bindParam(":login", $login);
        $db->bindParam(":password", $password);
        $db->execute();
        if($db->rowCount())
            return $db->fetchAll(\PDO::FETCH_CLASS)[0];
        return false;
    }

    /**
     * @param array $paciente
     * @return bool|string
     */
    public function create(array $paciente)
    {
        $database = self::getInstance();
        $db = $database->prepare("INSERT INTO paciente (nome_pai, nome_mae, tipo_sanguineo, pessoa_id) VALUES (:nome_pai, :nome_mae, :tipo_sanguineo, :pessoa_id)");
        $db->bindParam(":nome_pai", $paciente['nome_pai']);
        $db->bindParam(":nome_mae", $paciente['nome_mae']);
        $db->bindParam(":tipo_sanguineo", $paciente['tipo_sanguineo']);
        $db->bindParam(":pessoa_id", $paciente['pessoa_id']);
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
        $db = $database->prepare("DELETE FROM paciente WHERE id = $id");
        $db->execute();
        return $db->rowCount();
    }

    /**
     * @return array
     */
    public function getAll()
    {
        $db = self::getInstance()->prepare("SELECT t1.*, t2.nome, t2.cpf, t2.rg, t2.ativo, t3.nome as nacionalidade FROM paciente AS t1 INNER JOIN pessoa AS t2 ON (t1.pessoa_id = t2.id) INNER JOIN pais AS t3 ON (t2.nacionalidade_id = t3.id) ORDER BY t1.id DESC");
        $db->execute();
        return $db->fetchAll(\PDO::FETCH_CLASS);
    }

    /**
     * @return array
     */
    public function getActive()
    {
        $db = self::getInstance()->prepare("SELECT t1.*, t2.nome, t2.cpf, t2.rg, t2.ativo, t3.nome as nacionalidade FROM paciente AS t1 INNER JOIN pessoa AS t2 ON (t1.pessoa_id = t2.id) INNER JOIN pais AS t3 ON (t2.nacionalidade_id = t3.id) WHERE t2.ativo = 1 ORDER BY t1.id DESC");
        $db->execute();
        return $db->fetchAll(\PDO::FETCH_CLASS);
    }

    /**
     * @param int $paciente
     * @return array
     */
    public function get(int $paciente)
    {
        $db = self::getInstance()->prepare("SELECT t1.*, t2.nome, t2.email, t2.cpf, t2.rg, t2.ativo, t3.nome as nacionalidade FROM paciente AS t1 INNER JOIN pessoa AS t2 ON (t1.pessoa_id = t2.id) INNER JOIN pais AS t3 ON (t2.nacionalidade_id = t3.id) WHERE t1.id = :paciente");
        $db->bindParam(":paciente", $paciente);
        $db->execute();
        return $db->fetch();
    }
}