<?php
require_once('utilisateur.php');
class Station extends Utilisateur
{

	public function __construct(string $mail, string $login, string $password, string $nom, string $tel)
	{
		parent::__construct($mail, $login, $password, $nom, $tel);
	}

	public static function verifConnect(string $value, string $password)
	{
		$connection = new DBConnection(HOST, PORT, DBNAME, DBUSERNAME, DBPASSWORD);
		$connection = $connection->setConnection();
		$verif = $connection->prepare('SELECT * FROM station WHERE login=? OR mail=? AND password=?');
		$verif->execute(array($value, $value, $password));
		if ($verif->rowcount() == 1) {
			return $verif;
		}
		return false;
	}

	public static function connect(string $numCni): void
	{
		App::addSession(array('station' => $numCni));
		App::redirect('dashboardstation/index.php');
	}

	public static function update(string ...$values)
	{
	}

	public static function delete(string $numCni)
	{
	}

	public static function get(string $numCni)
	{
	}

	public function insert()
	{
	}

	public static function getAll()
	{
		$connection = new DBConnection(HOST, PORT, DBNAME, DBUSERNAME, DBPASSWORD);
		$connection = $connection->setConnection();
		$verif = $connection->prepare('SELECT * FROM station');
		$verif->execute(array());
		if ($verif->rowcount() > 0) {
			return $verif;
		}
		return false;
	}
}
