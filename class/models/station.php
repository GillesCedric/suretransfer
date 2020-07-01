<?php
require_once('utilisateur.php');
class Station extends Utilisateur
{
	protected bool $isVerified;

	public function __construct(bool $isVerified, string $mail, string $login, string $password, string $numCni, string $nom, string $tel, int $createdAt, int $updatedAt)
	{
		parent::__construct($mail, $login, $password, $numCni, $nom, $tel, $createdAt, $updatedAt);
		$this->isVerified = $isVerified;
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
		App::addSession(array('client' => array('entreprise' => $numCni)));
		App::redirect('');
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
	}
}
