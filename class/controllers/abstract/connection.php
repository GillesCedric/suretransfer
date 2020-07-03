<?php
require_once(dirname(dirname(dirname(__DIR__))) . '/config.php');
require_once(CLASS_PATH . '/dbconnection.php');
require_once(CLASS_PATH . '/app.php');
abstract class Connection
{
	protected string $password;
	protected string $login;

	public function __construct(string $login, string $password)
	{
		$this->login = htmlspecialchars($login);
		$this->password = htmlspecialchars(md5($password));
	}

	protected function connect(array $values, string $location): void
	{
		App::addSession($values);
		App::redirect($location);
	}
}
