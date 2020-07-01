<?php
require('personne.php');
class Chauffeur extends Personne
{
	protected string $prenom;

	public function __construct(string $prenom)
	{
		$this->prenom = $prenom;
	}
}
