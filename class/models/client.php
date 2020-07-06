<?php
require_once('utilisateur.php');
require_once(dirname(dirname(__DIR__)) . '/config.php');
require_once(CLASS_PATH . '/dbconnection.php');
class Client extends Utilisateur
{
	protected string $prenom;

	public function __construct(string $prenom, string $mail, string $login, string $password, string $numCni, string $nom, string $tel)
	{
		parent::__construct($mail, $login, $password, $numCni, $nom, $tel);
		$this->prenom = $prenom;
	}

	public function insert()
	{
		$connection = new DBConnection(HOST, PORT, DBNAME, DBUSERNAME, DBPASSWORD);
		$connection = $connection->setConnection();
		$insert = $connection->prepare('INSERT INTO client(num_cni,nom,prenom,tel,mail,login,password,created_at,updated_at) VALUES (?,?,?,?,?,?,?,?,?)');
		$date = date('Y-m-d H:i:s');
		$insert = $insert->execute(array($this->numCni, $this->nom, $this->prenom, $this->tel, $this->mail, $this->login, $this->password, $date, $date));
	}

	public static function verifLogin(string $login): bool
	{
		$connection = new DBConnection(HOST, PORT, DBNAME, DBUSERNAME, DBPASSWORD);
		$connection = $connection->setConnection();
		$verif = $connection->prepare('SELECT * FROM client WHERE login=?');
		$verif->execute(array($login));
		if ($verif->rowcount() == 0) {
			return true;
		}
		return false;
	}

	public static function verifMail(string $login): bool
	{
		$connection = new DBConnection(HOST, PORT, DBNAME, DBUSERNAME, DBPASSWORD);
		$connection = $connection->setConnection();
		$verif = $connection->prepare('SELECT * FROM client WHERE login=?');
		$verif->execute(array($login));
		if ($verif->rowcount() == 0) {
			return true;
		}
		return false;
	}

	public static function verifConnect(string $value, string $password)
	{
		$connection = new DBConnection(HOST, PORT, DBNAME, DBUSERNAME, DBPASSWORD);
		$connection = $connection->setConnection();
		$verif = $connection->prepare('SELECT * FROM client WHERE login=? AND password=?');
		$verif->execute(array($value, $password));
		if ($verif->rowcount() == 1) {
			return $verif;
		}
		return false;
	}

	public static function connect(string $numCni): void
	{
		App::addSession(array('client' => $numCni));
		print_r($_SESSION);
		App::redirect('dashboardclient/index.php');
	}

	public static function update(string ...$values)
	{
	}

	public static function delete(string $numCni)
	{
	}

	public static function get(string $numCni)
	{
		$connection = new DBConnection(HOST, PORT, DBNAME, DBUSERNAME, DBPASSWORD);
		$connection = $connection->setConnection();
		$verif = $connection->prepare('SELECT * FROM client WHERE num_cni=?');
		$verif->execute(array($numCni));
		if ($verif->rowcount() == 1) {
			return $verif;
		}
		return false;
	}
}
