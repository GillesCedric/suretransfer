<?php
require_once('Blueprint.php');
class Entreprise extends Blueprint
{
	protected string $immat;
	protected string $marque;
	protected string $modele;
	protected string $couleur;

	public function __construct(string $immat, string $marque, string $modele, string $couleur, int $created_at, int $updated_at)
	{
		parent::__construct($created_at, $updated_at);
		$this->immat = $immat;
		$this->marque = $marque;
		$this->modele = $modele;
		$this->couleur = $couleur;
	}
}
