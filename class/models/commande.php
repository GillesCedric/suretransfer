<?php
require_once('autre.php');
abstract class Commande extends Autre
{
	protected string $statut;
	protected string $numCommande;

	public function __construct(string $numCommande, string $statut, int $montant, int $created_at, int $updated_at)
	{
		parent::__construct($montant, $created_at, $updated_at);
		$this->statut = $statut;
		$this->numCommande = $numCommande;
	}
}
