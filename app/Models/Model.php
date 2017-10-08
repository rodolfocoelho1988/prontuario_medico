<?php

namespace App\Models;

abstract class Model
{
	/**
	 * Name of Database
	 * @var string
	 */
	private $database_name = 'sysmedic';
	/**
	 * IP of MySQL Server
	 * @var string
	 */
	private $server = '127.0.0.1';
	/**
	 * User of Database
	 * @var string
	 */
	private $username = 'root';
	/**
	 * Password of Database
	 * @var string
	 */
	private $password = '123456';
	/**
	 * Database encoding
	 * @var string
	 */
	private $charset = 'UTF8';
	/**
	 * Port of MySQL Server
	 * @var string
	 */
	private $port = '3306';
	/**
	 * Prefix of Database
	 * @var string
	 */
	private $prefix = '';
	/**
	 * Option PDO of Database
	 * @var array
	 */
	private $option = [
		\PDO::ATTR_CASE => \PDO::CASE_NATURAL,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
        \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
	];

	private static $objInstance;

    /**
     * Model constructor.
     */
    public function __construct()
	{
        $this->verifyEnvironment();
		try {
            if(!self::$objInstance) {
                self::$objInstance = new \PDO("mysql:host=$this->server;dbname=$this->database_name", $this->username, $this->password, $this->option);
                self::$objInstance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            }
		} catch(\Exception $e) {
			echo $e->getMessage();
			die;
		}
	}

	/**
	 * Method to access the database
	 * @return \PDO
	 */
	protected static function getInstance(): \PDO
	{
		return self::$objInstance;
	}

    /**
     * @param string $table
     * @param string $column
     * @param string $value
     * @return int
     */
    public function valueExist(string $table, string $column, string $value)
    {
        $db = self::getInstance();
        $db = $db->prepare("SELECT * FROM $table WHERE $column = :value");
        $db->bindParam(":value", $value);
        $db->execute();
        return $db->rowCount();
    }

    /**
     * Verifica o ambiente
     */
    private function verifyEnvironment()
    {
        $this->server = ($_SERVER['HTTP_HOST'] == 'localhost') ? 'localhost': '149.56.170.139';
        $this->username = ($_SERVER['HTTP_HOST'] == 'localhost') ? 'root': 'admin_prontuario';
        $this->password = ($_SERVER['HTTP_HOST'] == 'localhost') ? '123456': 'eRw513@w';
        $this->database_name = ($_SERVER['HTTP_HOST'] == 'localhost') ? 'sysmedic': 'lockhost_prontuario';
    }
}