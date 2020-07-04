<?php
require_once('station.php');
require_once(dirname(dirname(__DIR__)) . '/config.php');
require_once(CLASS_PATH . '/dbconnection.php');
class Annexe extends Station
{
	private string $ville;
	private string $quartier;
	private int $isActivated;
	private int $idStation;

	public function __construct(string $ville, string $quartier, string $tel, string $mail, array $station)
	{
		$newName = $station['nom'] . '' . $ville;
		$login = $this->generateLogin($newName);
		$password = $this->generatePassword($newName);
		Mail::sendMailLoginPassword($newName, $mail, $login, $password);
		parent::__construct($mail, $login, $password, $newName, $tel);
		$this->ville = $ville;
		$this->quartier = $quartier;
		$this->isActivated = 1;
		$this->idStation = $station['id'];
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

	public static function updateStatut(string $val, string $statut)
	{
		$connection = new DBConnection(HOST, PORT, DBNAME, DBUSERNAME, DBPASSWORD);
		$connection = $connection->setConnection();
		$update = $connection->prepare('UPDATE annexe SET is_activated=? WHERE id=?');
		$update->execute(array($statut, $val));
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
		$verif = $connection->prepare('SELECT DISTINCT annexe.is_activated,station.id AS id,station.nom,annexe.ville,annexe.quartier,COUNT(num_commande) AS totalcommande,SUM(montant) AS totalmontant FROM station INNER JOIN annexe ON station.id=annexe.id_station INNER JOIN commande ON annexe.id=commande.id_annexe WHERE station.id=?');
		$verif->execute(array($numCni));
		if ($verif->rowcount() > 0) {
			return $verif;
		}
		return false;
	}

	public static function getStation2(int $numCni)
	{
		$connection = new DBConnection(HOST, PORT, DBNAME, DBUSERNAME, DBPASSWORD);
		$connection = $connection->setConnection();
		$verif = $connection->prepare('SELECT DISTINCT annexe.tel,annexe.mail,annexe.is_activated,station.id AS id,station.nom,annexe.ville,annexe.quartier FROM station INNER JOIN annexe ON station.id=annexe.id_station  WHERE station.id=?');
		$verif->execute(array($numCni));
		if ($verif->rowcount() > 0) {
			return $verif;
		}
		return false;
	}

	public function insert()
	{
		$connection = new DBConnection(HOST, PORT, DBNAME, DBUSERNAME, DBPASSWORD);
		$connection = $connection->setConnection();
		$insert = $connection->prepare('INSERT INTO annexe(ville,quartier,tel,login,mail,password,is_activated,created_at,updated_at,id_station) VALUES (?,?,?,?,?,?,?,?,?,?)');
		$date = date('Y-m-d H:i:s');
		$insert->execute(array($this->ville, $this->quartier, $this->tel, $this->login, $this->mail, md5($this->password), $this->isActivated, $date, $date, $this->idStation));
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
