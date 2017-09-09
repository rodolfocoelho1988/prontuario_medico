<?php

namespace App\Models;

class Secretaria extends Model
{
    /**
     * Secretaria constructor.
     */
    public function __construct()
    {
        parent::__construct();
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
        $db = $db->prepare("SELECT t1.* FROM pessoa as t1 INNER JOIN secretaria as t2 ON (t2.pessoa_id = t1.id) WHERE t1.email = :login AND t1.senha = :password");
        $db->bindParam(":login", $login);
        $db->bindParam(":password", $password);
        $db->execute();
        if($db->rowCount()) {
            $result = $db->fetchAll(\PDO::FETCH_CLASS)[0];
            $result->perfil = "secretaria";
            return $result;

        }
        return false;
    }
}