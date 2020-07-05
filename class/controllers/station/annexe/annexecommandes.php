<?php
require_once(dirname(dirname(dirname(dirname(__DIR__)))) . '/config.php');
require_once(CLASS_PATH . '/dbconnection.php');
require_once(CLASS_PATH . '/app.php');
require_once(MODELS_PATH . '/commande.php');
require_once(MODELS_PATH . '/vehicule.php');
require_once(MODELS_PATH . '/chauffeur.php');
require_once(MODELS_PATH . '/pompiste.php');
require_once(MODELS_PATH . '/station.php');
require_once(MODELS_PATH . '/annexe.php');

class AnnexeCommandes
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

	public static function updatestatutCommande(string $numCommande, string $statut, string $numCni)
	{
		Commande::updateStatut($numCommande, $statut, $numCni);
	}

	public static function updatestatut(string $numCommande, int $statut)
	{
		Pompiste::updateStatut($numCommande, $statut);
	}

	public function insert(string $nom, string $prenom, string $tel, string $mail, string $cni)
	{
		if (!empty($nom) && !empty($prenom) && !empty($tel) && !empty($mail) && !empty($cni)) {
			$commande = new Pompiste($mail, $cni, $nom, $prenom, $tel, $this->numCni);
			$commande->insert();
			App::msg("Commande enregistrée");
			App::redirect('index.php');
		} else {
			App::error('Veuillez remplir tous les champs');
		}
	}

	public function getAnnexe()
	{
		return Annexe::get($this->numCni);
	}

	public function getPompiste()
	{
		return Pompiste::getAllAnnexe($this->numCni);
	}

	public static function verifConnection()
	{
		if (isset($_SESSION['annexe']) && !empty($_SESSION['annexe'])) {
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

	public function getNBCommandeAnnexe(string $statut = null)
	{
		return Commande::getNBCommandeAnnexe($this->numCni, $statut);
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
