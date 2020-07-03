<?php
require_once('utilisateur.php');
class Pompiste extends Utilisateur
{
	private int $numBox;
	private bool $isActivated;

	public function __construct(string $numBox, bool $isActivated, string $mail, string $login, string $password, string $numCni, string $nom, string $tel, int $createdAt, int $updatedAt)
	{
		parent::__construct($mail, $login, $password, $numCni, $nom, $tel, $createdAt, $updatedAt);
		$this->numBox = $numBox;
		$this->isActivated = $isActivated;
	}

	public static function verifConnect(string $value, string $password)
	{
		$connection = new DBConnection(HOST, PORT, DBNAME, DBUSERNAME, DBPASSWORD);
		$connection = $connection->setConnection();
		$verif = $connection->prepare('SELECT * FROM pompiste WHERE login=? AND password=?');
		$verif->execute(array($value, $password));
		if ($verif->rowcount() == 1) {
			return $verif;
		}
		return false;
	}

	public static function connect(string $numCni): void
	{
		App::addSession(array('pompiste' => $numCni));
		App::redirect('dashboardpompiste/index.php');
	}

	public static function update(string ...$values)
	{
	}

	public static function delete(string $numCni)
	{
	}

	public static function get(string $numCni)
	{
		$connection = new DBConnection(HOST, PORT, DBNAME, DBUSERNAME, DBPASSWORD);
		$connection = $connection->setConnection();
		$verif = $connection->prepare('SELECT * FROM pompiste WHERE num_cni=?');
		$verif->execute(array($numCni));
		if ($verif->rowcount() == 1) {
			return $verif;
		}
		return false;
	}

	public function insert()
	{
	}

	public static function getAll()
	{
	}

	public function getNumBox(): int
	{
		return $this->numBox;
	}

	public function setNumBox(int $numBox): void
	{
		$this->numBox = $numBox;
	}

	public function getIsActivated(): bool
	{
		return $this->isActivated;
	}

	public function setIsActivated(int $isActivated): void
	{
		$this->isActivated = $isActivated;
	}
}
