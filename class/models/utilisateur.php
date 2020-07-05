<?php
require_once('personne.php');
abstract class Utilisateur extends Personne
{
	protected string $mail;
	protected string $login;
	protected string $password;

	public function __construct(string $mail, string $login, string $password, string $nom, string $tel, ?string $numCni = null)
	{
		parent::__construct($nom, $tel, $numCni);
		$this->mail = $mail;
		$this->login = $login;
		$this->password = $password;
	}

	public abstract static function update(string ...$values);

	public abstract static function connect(string $value): void;

	public abstract static function verifConnect(string $value, string $password);

	protected function generateLogin(string $nom): string
	{
		return $nom . '' . rand(0, 9) . '' . rand(0, 9) . '' . rand(0, 9);
	}

	protected function generatePassword(string $nom): string
	{
		return $nom . '' . time();
	}
}
