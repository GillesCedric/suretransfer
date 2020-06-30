<?php
require('station.php');
abstract class Annexe extends Station
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
		App::addSession(array('client' => array('entreprise' => $numCni)));
		App::redirect('');
	}
}
