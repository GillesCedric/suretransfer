<?php
abstract class Autre
{
	protected int $montant;

	public function __construct(int $montant)
	{
		$this->montant = $montant;
	}

	public abstract static function delete(string $val);

	public abstract static function get(string $val);
}
