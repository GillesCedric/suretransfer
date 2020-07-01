<?php
require_once('Blueprint.php');
class Entreprise
{
	protected string $nom;
	protected string $ville;
	protected string $quartier;
	protected string $tel;
	protected string $mail;

	public function __construct(string $nom, string $ville, string $quartier, string $tel, string $mail)
	{
		$this->nom = $nom;
		$this->ville = $ville;
		$this->quartier = $quartier;
		$this->tel = $tel;
		$this->mail = $mail;
	}
}
