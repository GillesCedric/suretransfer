<?php
require_once('autre.php');
require_once(dirname(dirname(__DIR__)) . '/config.php');
require_once(CLASS_PATH . '/dbconnection.php');
require_once(CLASS_PATH . '/mail.php');
class Commande extends Autre
{
	protected string $statut;
	protected string $numCommande;
	protected string $mode;
	protected string $immat;
	protected string $numCniChauffeur;
	protected string $numCniClient;
	protected string $idAnnexe;
	protected string $service;

	public function __construct(string $mode, string $statut, int $montant, string $immat, string $numCniChauffeur, string $numCniClient, int $idAnnexe, string $service)
	{
		parent::__construct(htmlspecialchars($montant));
		$this->statut = htmlspecialchars($statut);
		$this->mode = htmlspecialchars($mode);
		$this->immat = htmlspecialchars($immat);
		$this->numCniChauffeur = htmlspecialchars($numCniChauffeur);
		$this->numCniClient = htmlspecialchars($numCniClient);
		$this->idAnnexe = htmlspecialchars($idAnnexe);
		$this->numCommande = time();
		$this->service = htmlspecialchars($service);
	}

	public static function delete(string $val)
	{
		# code...
	}

	public static function updateStatut2(string $val, string $statut, string $numCni)
	{
		$connection = new DBConnection(HOST, PORT, DBNAME, DBUSERNAME, DBPASSWORD);
		$connection = $connection->setConnection();
		$update = $connection->prepare('UPDATE commande SET statut=?,num_cni_pompiste=? WHERE num_commande=?');
		$update->execute(array($statut, $numCni, $val));
	}

	public static function updateStatut(string $val, string $statut)
	{
		$connection = new DBConnection(HOST, PORT, DBNAME, DBUSERNAME, DBPASSWORD);
		$connection = $connection->setConnection();
		$update = $connection->prepare('UPDATE commande SET statut=? WHERE num_commande=?');
		$update->execute(array($statut, $val));
	}

	public function insert()
	{
		$connection = new DBConnection(HOST, PORT, DBNAME, DBUSERNAME, DBPASSWORD);
		$connection = $connection->setConnection();
		$insert = $connection->prepare('INSERT INTO commande(num_commande,montant,statut,mode,service,created_at,updated_at,immat,num_cni_client,num_cni_chauffeur,id_annexe) VALUES (?,?,?,?,?,?,?,?,?,?,?)');
		$date = date('Y-m-d H:i:s');
		$insert = $insert->execute(array($this->numCommande, $this->montant, $this->statut, $this->mode, $this->service, $date, $date, $this->immat, $this->numCniClient, $this->numCniChauffeur, $this->idAnnexe));
		$mail = new Mail($date);
		$mail->sendMailAnnulation();
	}

	public static function get(string $val)
	{

		$connection = new DBConnection(HOST, PORT, DBNAME, DBUSERNAME, DBPASSWORD);
		$connection = $connection->setConnection();
		$get = $connection->prepare('SELECT client.nom AS nomclient,client.prenom AS prenomclient,commande.service,commande.num_commande,commande.montant,commande.statut,commande.created_at,vehicule.immat,chauffeur.nom AS nomchauffeur,chauffeur.prenom,annexe.quartier,station.nom AS nomstation FROM commande,annexe,chauffeur,vehicule,station,client WHERE commande.num_cni_client=? AND commande.num_cni_chauffeur=chauffeur.num_cni AND commande.id_annexe=annexe.id AND annexe.id_station=station.id AND commande.num_cni_client=client.num_cni');
		$get->execute(array($val));
		if ($get->rowCount() > 0) {
			return $get;
		}
		return false;
	}

	public static function getCommande(string $val)
	{

		$connection = new DBConnection(HOST, PORT, DBNAME, DBUSERNAME, DBPASSWORD);
		$connection = $connection->setConnection();
		$get = $connection->prepare('SELECT client.nom AS nomclient,client.prenom AS prenomclient,commande.service,commande.num_commande,commande.montant,commande.statut,commande.created_at,vehicule.immat,chauffeur.nom AS nomchauffeur,chauffeur.prenom,annexe.quartier,station.nom AS nomstation FROM commande,annexe,chauffeur,vehicule,station,client WHERE commande.num_commande=? AND commande.num_cni_chauffeur=chauffeur.num_cni AND commande.id_annexe=annexe.id AND annexe.id_station=station.id AND commande.num_cni_client=client.num_cni');
		$get->execute(array($val));
		if ($get->rowCount() > 0) {
			return $get;
		}
		return false;
	}

	public static function getAll(string $statut)
	{

		$connection = new DBConnection(HOST, PORT, DBNAME, DBUSERNAME, DBPASSWORD);
		$connection = $connection->setConnection();
		$get = $connection->prepare('SELECT chauffeur.num_cni AS num_cni_chauffeur,commande.service,vehicule.marque,vehicule.modele,vehicule.couleur,commande.num_commande,commande.montant,commande.statut,commande.created_at,vehicule.immat,chauffeur.nom AS nomchauffeur,chauffeur.prenom,annexe.quartier,station.nom AS nomstation FROM commande,annexe,chauffeur,vehicule,station WHERE commande.statut = ?');
		$get->execute(array($statut));
		if ($get->rowCount() > 0) {
			return $get;
		}
		return false;
	}

	public static function getDepensesMois(string $val)
	{

		$connection = new DBConnection(HOST, PORT, DBNAME, DBUSERNAME, DBPASSWORD);
		$connection = $connection->setConnection();
		$get = $connection->prepare('SELECT SUM(montant) AS montant FROM commande WHERE num_cni_client=? AND created_at BETWEEN ? AND ?');
		$dateDebut = date('Y-m') . '-01 00:00:00';
		$dateFin =  date('Y-m-t') . ' 23:59:59';
		$get->execute(array($val, $dateDebut, $dateFin));
		if ($get->rowCount() > 0) {
			return $get;
		}
		return false;
	}

	public static function getDepensesAnne(string $val)
	{

		$connection = new DBConnection(HOST, PORT, DBNAME, DBUSERNAME, DBPASSWORD);
		$connection = $connection->setConnection();
		$get = $connection->prepare('SELECT SUM(montant) AS montant FROM commande WHERE num_cni_client=? AND created_at BETWEEN ? AND ?');
		$dateDebut = date('Y') . '-01-01 00:00:00';
		$dateFin =  date('Y') . '-12-' . date('t') . ' 23:59:59';
		$get->execute(array($val, $dateDebut, $dateFin));
		if ($get->rowCount() > 0) {
			return $get;
		}
		return false;
	}

	public static function getNBCommande(string $val, string $statut = null)
	{

		$connection = new DBConnection(HOST, PORT, DBNAME, DBUSERNAME, DBPASSWORD);
		$connection = $connection->setConnection();
		if ($statut !== null) {
			$get = $connection->prepare('SELECT COUNT(num_commande) AS nbcommande FROM commande WHERE num_cni_client=? AND statut=?');
			$get->execute(array($val, $statut));
		} else {
			$get = $connection->prepare('SELECT COUNT(num_commande) AS nbcommande FROM commande WHERE num_cni_client=?');
			$get->execute(array($val));
		}
		if ($get->rowCount() > 0) {
			return $get;
		}
		return false;
	}
}
