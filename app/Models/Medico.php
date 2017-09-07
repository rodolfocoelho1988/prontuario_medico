<?php

namespace App\Models;

class Medico extends Model
{
    /**
     * Medico constructor.
     */
    public function __construct()
	{
		parent::__construct();
	}

    /**
     * Busca todos os médicos
     * @return array
     */
	public function getAll()
    {
        $db = self::getInstance()->prepare("SELECT * FROM medico");
        $db->execute();
        return $db->fetchAll(\PDO::FETCH_CLASS);
    }

    /**
     * Total de médicos cadastrados
     * @return mixed
     */
    public function getTotal()
    {
        $db = self::getInstance();
        $db = $db->prepare("SELECT count(*) as count FROM medico");
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
        $db = $db->prepare("SELECT t1.*, t2.crm FROM pessoa as t1 INNER JOIN medico as t2 ON (t2.pessoa_id = t1.id) WHERE t2.crm = :login AND t1.senha = :password");
        $db->bindParam(":login", $login);
        $db->bindParam(":password", $password);
        $db->execute();
        if($db->rowCount())
            return $db->fetchAll(\PDO::FETCH_CLASS)[0];
        return false;
    }
}