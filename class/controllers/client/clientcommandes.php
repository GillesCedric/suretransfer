<?php
require_once(dirname(dirname(dirname(__DIR__))) . '\config.php');
require_once(CLASS_PATH . '/dbconnection.php');
require_once(MODELS_PATH . '/commande.php');

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
}
