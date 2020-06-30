<?php
require('./utilisateur.php');
require('../../config.php');
require('../dbconnection.php');
abstract class Client extends Utilisateur
{
	protected string $prenom;
	protected bool $isVerified;

	public function __construct(string $prenom, bool $isVerified, string $mail, string $login, string $password, string $numCni, string $nom, string $tel, int $createdAt, int $updatedAt)
	{
		parent::__construct($mail, $login, $password, $numCni, $nom, $tel, $createdAt, $updatedAt);
		$this->prenom = $prenom;
		$this->isVerified = $isVerified;
	}

	public function insert()
	{
		$connection = new DBConnection(HOST, PORT, DBNAME, DBUSERNAME, DBPASSWORD);
		$connection = $connection->setConnection();
		$insert = $connection->prepare('INSERT INTO client() VALUES ()');
		$insert = $insert->execute(array());
	}

	public function verifConnect(string $value, string $password): bool
	{
		$connection = new DBConnection(HOST, PORT, DBNAME, DBUSERNAME, DBPASSWORD);
		$connection = $connection->setConnection();
		$verif = $connection->prepare('SELECT * FROM client WHERE login=? OR mail=? AND password=?');
		$verif->execute(array($value, $value, $password));
		if ($verif->rowcount() == 1) {
			return true;
		}
		return false;
	}

	public function connect(string $value, string $password): void
	{
		App::addSession(array('client' => $value));
	}
}
