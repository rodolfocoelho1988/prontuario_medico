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
}