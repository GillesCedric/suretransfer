<?php
abstract class Personne
{
	protected ?string $numCni;
	protected string $nom;
	protected string $tel;

	public function __construct(string $nom, string $tel, ?string $numCni = null)
	{
		$this->numCni = $numCni;
		$this->nom = $nom;
		$this->tel = $tel;
	}

	public abstract static function delete(string $numCni);

	public abstract static function get(string $numCni);
}
