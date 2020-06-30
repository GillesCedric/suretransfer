<?php
require('./station.php');
abstract class Station extends Utilisateur
{
	protected bool $isVerified;

	public function __construct(bool $isVerified, string $mail, string $login, string $password, string $numCni, string $nom, string $tel, int $createdAt, int $updatedAt)
	{
		parent::__construct($mail, $login, $password, $numCni, $nom, $tel, $createdAt, $updatedAt);
		$this->isVerified = $isVerified;
	}
}
