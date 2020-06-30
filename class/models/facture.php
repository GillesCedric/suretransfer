<?php
require_once('autre.php');
abstract class Facture extends Autre
{
	protected string $numFact;

	public function __construct(string $numFact, int $montant, int $created_at, int $updated_at)
	{
		parent::__construct($montant, $created_at, $updated_at);
		$this->numFact = $numFact;
	}
}
