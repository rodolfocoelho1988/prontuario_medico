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
        $db = self::getInstance()->prepare("SELECT t1.*, t2.nome, t2.ativo, t3.nome as nacionalidade FROM medico AS t1 INNER JOIN pessoa AS t2 ON (t1.pessoa_id = t2.id) INNER JOIN pais AS t3 ON (t2.nacionalidade_id = t3.id) ORDER BY t1.id DESC");
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
        $db = $db->prepare("SELECT t1.*, t2.crm, t2.id as medico_id FROM pessoa as t1 INNER JOIN medico as t2 ON (t2.pessoa_id = t1.id) WHERE t2.crm = :login AND t1.senha = :password AND t1.ativo = 1 AND t1.ativo = 1");
        $db->bindParam(":login", $login);
        $db->bindParam(":password", $password);
        $db->execute();
        if($db->rowCount())
            return $db->fetchAll(\PDO::FETCH_CLASS)[0];
        return false;
    }

    /**
     * @param array $medico
     * @return bool|string
     */
    public function create(array $medico)
    {
        $database = self::getInstance();
        $db = $database->prepare("INSERT INTO medico (crm, pessoa_id) VALUES (:crm, :pessoa_id)");
        $db->bindParam(":crm", $medico['crm']);
        $db->bindParam(":pessoa_id", $medico['pessoa_id']);
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
        $db = $database->prepare("DELETE FROM medico WHERE id = $id");
        $db->execute();
        return $db->rowCount();
    }

    /**
     * @return array
     */
    public function getActive()
    {
        $db = self::getInstance()->prepare("SELECT t1.*, t2.nome, t2.ativo, t3.nome as nacionalidade FROM medico AS t1 INNER JOIN pessoa AS t2 ON (t1.pessoa_id = t2.id) INNER JOIN pais AS t3 ON (t2.nacionalidade_id = t3.id) WHERE t2.ativo = 1 ORDER BY t1.id DESC");
        $db->execute();
        return $db->fetchAll(\PDO::FETCH_CLASS);
    }
}