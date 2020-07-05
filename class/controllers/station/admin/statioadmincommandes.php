<?php
require_once(dirname(dirname(dirname(dirname(__DIR__)))) . '/config.php');
require_once(CLASS_PATH . '/dbconnection.php');
require_once(CLASS_PATH . '/app.php');
require_once(MODELS_PATH . '/commande.php');
require_once(MODELS_PATH . '/vehicule.php');
require_once(MODELS_PATH . '/chauffeur.php');
require_once(MODELS_PATH . '/admin.php');
require_once(MODELS_PATH . '/station.php');
require_once(MODELS_PATH . '/annexe.php');

class StationAdminCommandes
{
	private string $numCni;
	public function __construct(string $numCni)
	{
		$this->numCni = $numCni;
	}

	public function getAll(string $statut)
	{
		return Commande::getAll($statut);
	}

	public static function updatestatut(string $numCommande, string $statut)
	{
		Annexe::updateStatut(intval($numCommande), intval($statut));
	}

	public function insert(string $ville, string $quartier, string $tel, string $mail, array $station)
	{
		if (!empty($ville) && !empty($quartier) && !empty($tel) && !empty($mail)) {
			$commande = new Annexe($ville, $quartier, $tel, $mail, $station);
			$commande->insert();
			App::msg("Annexe enregistrée");
			App::redirect('index.php');
		} else {
			App::error('Veuillez remplir tous les champs');
		}
	}

	public function getAdmin()
	{
		return Admin::get($this->numCni);
	}

	public static function verifConnection()
	{
		if (isset($_SESSION['station']) && !empty($_SESSION['station'])) {
			return true;
		}
		App::redirect('../connexion.php');
	}

	public function getStation()
	{
		return Station::getAll($this->numCni);
	}

	public function getStationAnnexe()
	{
		return Annexe::getAll();
	}

	public function get()
	{
		return Annexe::getStation(intval($this->numCni));
	}

	public function get2()
	{
		return Annexe::getStation2(intval($this->numCni));
	}

	public function getChaufffeur()
	{
		return Chauffeur::getClient($this->numCni);
	}

	public function getVehicule()
	{
		return Vehicule::getClient($this->numCni);
	}

	public function getDepensesMois()
	{
		return Commande::getDepensesMois($this->numCni);
	}

	public function getDepensesAnne()
	{
		return Commande::getDepensesAnne($this->numCni);
	}

	public function getNBCommande(string $statut = null)
	{
		return Commande::getNBCommande($this->numCni, $statut);
	}

	public function getNBVehicule()
	{
		return Vehicule::getNBVehicule($this->numCni);
	}

	public function getNBChauffeur()
	{
		return Chauffeur::getNBChauffeur($this->numCni);
	}
}
