<?php
require('./personne.php');
abstract class Chauffeur extends Personne
{
	protected string $prenom;

	public function __construct(string $prenom)
	{
		$this->prenom = $prenom;
	}
}
