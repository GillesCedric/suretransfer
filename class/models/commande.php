<?php
require_once('autre.php');
require_once(dirname(dirname(__DIR__)) . '/config.php');
require_once(CLASS_PATH . '/dbconnection.php');
class Commande extends Autre
{
	protected string $statut;
	protected string $numCommande;

	public function __construct(string $numCommande, string $statut, int $montant, int $created_at, int $updated_at)
	{
		parent::__construct($montant, $created_at, $updated_at);
		$this->statut = $statut;
		$this->numCommande = $numCommande;
	}

	public static function delete(string $val)
	{
		# code...
	}

	public static function get(string $val)
	{

		$connection = new DBConnection(HOST, PORT, DBNAME, DBUSERNAME, DBPASSWORD);
		$connection = $connection->setConnection();
		$get = $connection->prepare('SELECT commande.num_commande,commande.montant,commande.statut,commande.created_at,vehicule.immat,chauffeur.nom AS nomchauffeur,chauffeur.prenom,annexe.quartier,station.nom AS nomstation FROM commande,annexe,chauffeur,vehicule,station WHERE commande.num_cni_client=? AND commande.num_cni_chauffeur=chauffeur.num_cni AND commande.id_annexe=annexe.id AND annexe.id_station=station.id');
		$get->execute(array($val));
		if ($get->rowCount() > 0) {
			return $get;
		}
		return false;
	}
}
