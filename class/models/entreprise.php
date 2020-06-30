<?php
require('./Blueprint.php');
abstract class Entreprise extends Blueprint
{
	protected string $nom;
	protected string $ville;
	protected string $quartier;
	protected string $tel;
	protected string $mail;

	public function __construct(string $nom, string $ville, string $quartier, string $tel, string $mail, int $created_at, int $updated_at)
	{
		parent::__construct($created_at, $updated_at);
		$this->nom = $nom;
		$this->ville = $ville;
		$this->quartier = $quartier;
		$this->tel = $tel;
		$this->mail = $mail;
	}
}
