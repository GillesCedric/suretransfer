<?php
require_once('Blueprint.php');
abstract class Personne extends Blueprint
{
	protected string $numCni;
	protected string $nom;
	protected string $tel;

	public function __construct(string $numCni, string $nom, string $tel, int $createdAt, int $updatedAt)
	{
		parent::__construct($createdAt, $updatedAt);
		$this->numCni = $numCni;
		$this->nom = $nom;
		$this->tel = $tel;
	}

	public abstract static function delete(string $numCni);

	public abstract static function get(string $numCni);
}
