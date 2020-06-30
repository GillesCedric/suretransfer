<?php
require('./Station.php');
abstract class Annexe extends Station
{
	private string $ville;
	private string $quartier;

	public function __construct(string $ville, string $quartier, int $isVerified, string $mail, string $login, string $password, string $numCni, string $nom, string $tel, int $createdAt, int $updatedAt)
	{
		parent::__construct($isVerified, $mail, $login, $password, $numCni, $nom, $tel, $createdAt, $updatedAt);
		$this->ville = $ville;
		$this->quartier = $quartier;
	}
}
