<?php
require('./personne.php');
abstract class Utilisateur extends Personne
{
	protected string $mail;
	protected string $login;
	protected string $password;

	public function __construct(string $mail, string $login, string $password, string $numCni, string $nom, string $tel, int $createdAt, int $updatedAt)
	{
		parent::__construct($numCni, $nom, $tel, $createdAt, $updatedAt);
		$this->mail = $mail;
		$this->login = $login;
		$this->password = $password;
	}

	public abstract static function update(string ...$values);

	public abstract static function connect(string $value, string $password): void;

	public abstract static function verifConnect(string $value, string $password): bool;
}
