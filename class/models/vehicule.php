<?php
class Vehicule
{
	protected string $immat;
	protected string $marque;
	protected string $modele;
	protected string $couleur;
	private string $numCni;

	public function __construct(string $immat, string $marque, string $modele, string $couleur, string $numCni)
	{
		$this->immat = $immat;
		$this->marque = $marque;
		$this->modele = $modele;
		$this->couleur = $couleur;
		$this->numCni = $numCni;
	}

	public static function getImmat(string $immat)
	{
		# code...
	}

	public function insert()
	{
		$connection = new DBConnection(HOST, PORT, DBNAME, DBUSERNAME, DBPASSWORD);
		$connection = $connection->setConnection();
		$insert = $connection->prepare('INSERT INTO vehicule(immat,marque,modele,couleur,created_at,updated_at,num_cni_client) VALUES (?,?,?,?,?,?,?)');
		$date = date('Y-m-d H:i:s');
		$insert = $insert->execute(array($this->immat, $this->marque, $this->modele, $this->couleur, $date, $date, $this->numCni));
	}

	public static function getClient(string $numCni)
	{
		$connection = new DBConnection(HOST, PORT, DBNAME, DBUSERNAME, DBPASSWORD);
		$connection = $connection->setConnection();
		$get = $connection->prepare('SELECT * FROM vehicule WHERE num_cni_client=?');
		$get->execute(array($numCni));
		if ($get->rowCount() > 0) {
			return $get;
		}
		return false;
	}

	public static function getNBVehicule(string $numCni)
	{
		$connection = new DBConnection(HOST, PORT, DBNAME, DBUSERNAME, DBPASSWORD);
		$connection = $connection->setConnection();
		$get = $connection->prepare('SELECT COUNT(immat) as nbvehicule FROM vehicule WHERE num_cni_client=?');
		$get->execute(array($numCni));
		if ($get->rowCount() > 0) {
			return $get;
		}
		return false;
	}
}
