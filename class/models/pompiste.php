<?php
require('./utilisateur.php');
abstract class Pompiste extends Utilisateur
{
	private int $numBox;
	private bool $isActivated;

	public function __construct(string $numBox, bool $isActivated, string $mail, string $login, string $password, string $numCni, string $nom, string $tel, int $createdAt, int $updatedAt)
	{
		parent::__construct($mail, $login, $password, $numCni, $nom, $tel, $createdAt, $updatedAt);
		$this->numBox = $numBox;
		$this->isActivated = $isActivated;
	}

	public function getNumBox(): int
	{
		return $this->numBox;
	}

	public function setNumBox(int $numBox): void
	{
		$this->numBox = $numBox;
	}

	public function getIsActivated(): bool
	{
		return $this->isActivated;
	}

	public function setIsActivated(int $isActivated): void
	{
		$this->isActivated = $isActivated;
	}
}
