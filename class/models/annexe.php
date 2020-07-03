<?php
require_once('station.php');
require_once(dirname(dirname(__DIR__)) . '/config.php');
require_once(CLASS_PATH . '/dbconnection.php');
class Annexe extends Station
{
	private string $ville;
	private string $quartier;

	public function __construct(string $ville, string $quartier, int $isVerified, string $mail, string $login, string $password, string $numCni, string $nom, string $tel, int $createdAt, int $updatedAt)
	{
		parent::__construct($isVerified, $mail, $login, $password, $numCni, $nom, $tel, $createdAt, $updatedAt);
		$this->ville = $ville;
		$this->quartier = $quartier;
	}

	public static function verifConnect(string $value, string $password)
	{
		$connection = new DBConnection(HOST, PORT, DBNAME, DBUSERNAME, DBPASSWORD);
		$connection = $connection->setConnection();
		$verif = $connection->prepare('SELECT * FROM annexe WHERE login=? OR mail=? AND password=?');
		$verif->execute(array($value, $value, $password));
		if ($verif->rowcount() == 1) {
			return $verif;
		}
		return false;
	}

	public static function connect(string $numCni): void
	{
		App::addSession(array('annexe' => $numCni));
		App::redirect('dashboardannexe/index.php');
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
		$verif = $connection->prepare('SELECT * FROM annexe WHERE id=?');
		$verif->execute(array($numCni));
		if ($verif->rowcount() == 1) {
			return $verif;
		}
		return false;
	}

	public static function getStation(int $numCni)
	{
		$connection = new DBConnection(HOST, PORT, DBNAME, DBUSERNAME, DBPASSWORD);
		$connection = $connection->setConnection();
		$verif = $connection->prepare('SELECT station.nom,annexe.ville,annexe.quartier,COUNT(num_commande) AS totalcommande,SUM(montant) AS totalmontant FROM station,annexe,commande WHERE station.id=?');
		$verif->execute(array($numCni));
		if ($verif->rowcount() > 0) {
			return $verif;
		}
		return false;
	}

	public function insert()
	{
	}

	public static function getAllByVille(string $ville)
	{
		$connection = new DBConnection(HOST, PORT, DBNAME, DBUSERNAME, DBPASSWORD);
		$connection = $connection->setConnection();
		$verif = $connection->prepare('SELECT * FROM annexe WHERE ville=?');
		$verif->execute(array($ville));
		if ($verif->rowcount() > 0) {
			return true;
		}
		return false;
	}
	public static function getAll()
	{
		$connection = new DBConnection(HOST, PORT, DBNAME, DBUSERNAME, DBPASSWORD);
		$connection = $connection->setConnection();
		$verif = $connection->prepare('SELECT * FROM annexe');
		$verif->execute(array());
		if ($verif->rowcount() > 0) {
			return $verif;
		}
		return false;
	}
}
