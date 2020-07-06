<?php
require_once(dirname(dirname(dirname(__DIR__))) . '/config.php');
require_once(CLASS_PATH . '/dbconnection.php');
require_once(CLASS_PATH . '/app.php');
abstract class Inscription
{
	protected string $numCni;
	protected string $nom;
	protected string $prenom;
	protected string $tel;
	protected string $mail;
	protected string $login;
	protected string $password;
	protected string $confirmpassword;
	protected int $createdAt;
	protected int $updatedAt;

	public function __construct(string $numCni, string $nom, string $prenom, string $tel, string $mail, string $login, string $confirmpassword, string $password)
	{
		$this->numCni = htmlspecialchars($numCni);
		$this->nom = htmlspecialchars($nom);
		$this->login = htmlspecialchars($login);
		$this->prenom = htmlspecialchars($prenom);
		$this->tel = htmlspecialchars($tel);
		$this->mail = htmlspecialchars($mail);
		$this->password = htmlspecialchars(md5($password));
		$this->confirmpassword = htmlspecialchars(md5($confirmpassword));
	}

	protected function connect(array $values, string $location): void
	{
		App::addSession($values);
		App::redirect($location);
	}
}
