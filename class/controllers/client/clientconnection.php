<?php
require('../config.php');
require(CONTROLLERS_PATH . '/abstract/connection.php');
require(CLASS_PATH . '/dbconnection.php');

class ClientConnection extends Connection
{
	public function __construct(string $login, string $password)
	{
		parent::__construct($login, $password);
	}

	public function verifUser(string $login, string $password)
	{
	}
}
