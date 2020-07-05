<?php
require_once(dirname(dirname(dirname(__DIR__))) . '/config.php');
require_once(CLASS_PATH . '/dbconnection.php');
require_once(CLASS_PATH . '/app.php');
require_once(MODELS_PATH . '/commande.php');
require_once(MODELS_PATH . '/vehicule.php');
require_once(MODELS_PATH . '/chauffeur.php');
require_once(MODELS_PATH . '/client.php');
require_once(MODELS_PATH . '/station.php');
require_once(MODELS_PATH . '/annexe.php');

class ClientCommandes
{
	private string $numCni;
	public function __construct(string $numCni)
	{
		$this->numCni = $numCni;
	}

	public function getAll()
	{
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

	public function insertVehicule(string $immat, string $marque, string $modele, string $couleur, string $client)
	{
		if (!empty($immat) && !empty($marque) && !empty($modele) && !empty($couleur) && !empty($client)) {
			$commande = new Vehicule($immat, $marque, $modele, $couleur, $client);
			$commande->insert();
			App::msg("Véhicule enregistrée");
			App::redirect('index.php');
		} else {
			App::error('Veuillez remplir tous les champs');
		}
	}

	public function insertChauffeur(string $numCni, string $nom, string $prenom, string $tel, string $client)
	{
		if (!empty($numCni) && !empty($nom) && !empty($prenom) && !empty($tel) && !empty($client)) {
			$commande = new Chauffeur($numCni, $nom, $prenom, $tel, $client);
			$commande->insert();
			App::msg("Chauffeur enregistrée");
			App::redirect('index.php');
		} else {
			App::error('Veuillez remplir tous les champs');
		}
	}

	public function getClient()
	{
		return Client::get($this->numCni);
	}

	public static function verifConnection()
	{
		if (isset($_SESSION['client']) && !empty($_SESSION['client'])) {
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
