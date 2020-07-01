<?php
require('personne.php');
class Chauffeur extends Personne
{
	protected string $prenom;

	public function __construct(string $prenom)
	{
		$this->prenom = $prenom;
	}

	public static function getClient(string $numCni)
	{
		$connection = new DBConnection(HOST, PORT, DBNAME, DBUSERNAME, DBPASSWORD);
		$connection = $connection->setConnection();
		$get = $connection->prepare('SELECT * FROM chauffeur WHERE num_cni_client=?');
		$get->execute(array($numCni));
		if ($get->rowCount() > 0) {
			return $get;
		}
		return false;
	}

	public static function getNBChauffeur(string $numCni)
	{
		$connection = new DBConnection(HOST, PORT, DBNAME, DBUSERNAME, DBPASSWORD);
		$connection = $connection->setConnection();
		$get = $connection->prepare('SELECT COUNT(num_cni) as nbchauffeur FROM chauffeur WHERE num_cni_client=?');
		$get->execute(array($numCni));
		if ($get->rowCount() > 0) {
			return $get;
		}
		return false;
	}

	public static function delete(string $numCni)
	{
	}

	public static function get(string $numCni)
	{
	}
}
