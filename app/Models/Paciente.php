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
        $db = $db->prepare("SELECT t1.*, t2.* FROM pessoa as t1 INNER JOIN paciente as t2 ON (t2.pessoa_id = t1.id) WHERE t1.email = :login AND t1.senha = :password");
        $db->bindParam(":login", $login);
        $db->bindParam(":password", $password);
        $db->execute();
        if($db->rowCount()) {
            $result = $db->fetchAll(\PDO::FETCH_CLASS)[0];
            $result->perfil = "paciente";
            return $result;

        }
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
}