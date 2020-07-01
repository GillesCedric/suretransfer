<?php
require_once(dirname(dirname(dirname(__DIR__))) . '\config.php');
require_once(CLASS_PATH . '/dbconnection.php');
require_once(MODELS_PATH . '/commande.php');
require_once(MODELS_PATH . '/vehicule.php');
require_once(MODELS_PATH . '/chauffeur.php');

class ClientCommandes
{
	private string $numCni;
	public function __construct(string $numCni)
	{
		$this->numCni = $numCni;
	}

	public function getAll()
	{
		# code...
	}

	public function get()
	{
		return Commande::get($this->numCni);
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
