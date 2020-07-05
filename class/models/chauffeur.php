<?php
require('personne.php');
class Chauffeur extends Personne
{
	protected string $prenom;
	protected string $numCniClient;

	public function __construct(string $numCni, string $nom, string $prenom, string $tel, string $numCniClient)
	{
		parent::__construct(htmlspecialchars($nom), htmlspecialchars($tel), htmlspecialchars($numCni));
		$this->prenom = $prenom;
		$this->numCniClient = $numCniClient;
	}

	public function insert()
	{
		$connection = new DBConnection(HOST, PORT, DBNAME, DBUSERNAME, DBPASSWORD);
		$connection = $connection->setConnection();
		$insert = $connection->prepare('INSERT INTO chauffeur(num_cni,nom,prenom,tel,created_at,updated_at,num_cni_client) VALUES (?,?,?,?,?,?,?)');
		$date = date('Y-m-d H:i:s');
		$insert = $insert->execute(array($this->numCni, $this->nom, $this->prenom, $this->tel, $date, $date, $this->numCniClient));
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
