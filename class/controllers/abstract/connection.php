<?php
require('../../config.php');
require(CLASS_PATH . '/dbconnection.php');
require(CLASS_PATH . '/app.php');
abstract class Connection
{
	protected string $_password;
	protected string $_login;
	protected PDO $_connection;

	public function __construct(string $login, string $password)
	{
		$this->_login = $login;
		$this->_password = $password;
		$this->_connection = new DBConnection();
	}

	public abstract function verifUser(): bool;

	protected function connect(array $values, string $location): void
	{
		App::addSession($values);
		App::redirect($location);
	}
}
