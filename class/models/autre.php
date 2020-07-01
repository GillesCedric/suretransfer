<?php
require('.blueprint.php');
abstract class Autre
{
	protected int $montant;

	public function __construct(int $montant, int $created_at, int $updated_at)
	{
		$this->tel = $montant;
	}

	public abstract static function delete(string $val);

	public abstract static function get(string $val);
}
