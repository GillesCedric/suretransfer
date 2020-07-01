<?php
class Vehicule
{
	protected string $immat;
	protected string $marque;
	protected string $modele;
	protected string $couleur;

	public function __construct(string $immat, string $marque, string $modele, string $couleur)
	{
		$this->immat = $immat;
		$this->marque = $marque;
		$this->modele = $modele;
		$this->couleur = $couleur;
	}

	public static function getImmat(string $immat)
	{
		# code...
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
