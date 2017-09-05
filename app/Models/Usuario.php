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
     * Efetuar login do usuário do sistema
     * @param $login
     * @param $password
     * @param $tabela
     * @return array|bool
     */
    public function login($login, $password, $tabela)
    {
        $db = self::getInstance();

        if($tabela === "medico")
            $db = $db->prepare("SELECT t1.*, t2.* FROM pessoa as t1 INNER JOIN medico as t2 ON (t2.pessoa_id = t1.id) WHERE t2.crm = :login AND t1.senha = :password");
        else
            $db = $db->prepare("SELECT t1.*, t2.* FROM pessoa as t1 INNER JOIN paciente as t2 ON (t2.pessoa_id = t1.id) WHERE t1.email = :login AND t1.senha = :password");

        $db->bindParam(":login", $login);
        $db->bindParam(":password", $password);
        $db->execute();
        if($db->rowCount())
            return $db->fetchAll(\PDO::FETCH_CLASS);
        return false;
    }
}