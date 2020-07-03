<?php
require_once(dirname(dirname(dirname(dirname(__DIR__)))) . '\config.php');
require_once(CLASS_PATH . '/dbconnection.php');
require_once(CLASS_PATH . '/app.php');
require_once(MODELS_PATH . '/commande.php');
require_once(MODELS_PATH . '/vehicule.php');
require_once(MODELS_PATH . '/chauffeur.php');
require_once(MODELS_PATH . '/admin.php');
require_once(MODELS_PATH . '/station.php');
require_once(MODELS_PATH . '/pompiste.php');

class PompisteCommandes
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
		Commande::updateStatut($numCommande, $statut);
	}

	public function insert(string $mode, int $montant, string $vehicule, string $chauffeur, string $client, string $station, string $service)
	{
		if (!empty($mode) && !empty($montant) && !empty($vehicule) && !empty($chauffeur) && !empty($client) && !empty($station) && !empty($service)) {
			$commande = new Commande($mode, 'en attente', $montant, $vehicule, $chauffeur, $client, $station, $service);
			$commande->insert();
			App::msg("Commande enregistrée");
			App::redirect('index.php');
		} else {
			App::error('Veuillez remplir tous les champs');
		}
	}

	public function getPompiste()
	{
		return Pompiste::get($this->numCni);
	}

	public static function verifConnection()
	{
		if (isset($_SESSION['admin']) && !empty($_SESSION['admin'])) {
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
		return Commande::get($this->numCni);
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
